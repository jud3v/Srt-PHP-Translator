<?php
declare(strict_types=1);

require 'vendor/autoload.php';
require 'Colors.php';
class Translate
{
    public function __construct()
    {
        if (PHP_SAPI != "cli") {
            exit;
        }
    }

    private static function showHelp()
    {
        $help = 'Welcome To PHP Translator !'.PHP_EOL.PHP_EOL;
        $help .= '--help,-help,help Show the current block'.PHP_EOL;
        $help .= '-f language of source'.PHP_EOL;
        $help .= '-d language of destination'.PHP_EOL;
        $help .= '-a file to translate'.PHP_EOL.PHP_EOL;
        echo $help;
        exit;
    }

    /**
     * Get argument from command line interface.
     *
     * @throws ErrorException
     */
    public static function getArgument()
    {
        $color = new \Colors();
        $shortopts  = "";
        $shortopts .= "f:";  // Langue source du fichier
        $shortopts .= "d:";  // Langue de destination
        $shortopts .= "a:";  // Fichier a traduire

        $longopts  = array(
            "help",     // Valeur requise
        );

        $options = getopt($shortopts, $longopts);
        foreach ($options as $key => $value) {
            if ($key === "help") {
                self::showHelp();
                exit;
            }
        }
        if (count($options) > 3 || count($options) < 3) {
            echo $color->getColoredString('Required parameter are missing !','black','red').PHP_EOL;
            self::showHelp();
            exit;
        } else {
            self::translate($options);
        }
    }

    /**
     * Copy the original wanted file to an copied translated file.
     *
     * @param $option
     * @throws ErrorException
     */
    private static function translate($option)
    {
        $color = new Colors();
        $file = $option['a'];
        $dist = $option['d'];
        $source = $option['f'];

        if (file_exists($file)) {
            //copy($file,str_replace('.srt','-translated.srt',$file));
            $copy = str_replace('.srt','-translated-to-'.$dist.'.srt',$file); //get path of copied file.
            echo 'The path of your translated file is: '.$copy.PHP_EOL;
            $ch = fopen($copy,'w'); // remove content of file with mode w https://www.php.net/manual/fr/function.fopen.php.
            fclose($ch);

            if (file_exists($copy)) {
                $content = file($file); //content of the original file to translate into the copyied file.

                foreach ($content as $key => $value) {
                    //sleep(0.5);
                    $translate = new Stichoza\GoogleTranslate\GoogleTranslate();
                    $translate->setSource($source);
                    $translate->setTarget($dist);
                    $ch = fopen($copy,'a');
                    fwrite($ch,$translate->translate($value).PHP_EOL);
                    echo $color->getColoredString('Translating:'. $value,'white','black');
                    echo $color->getColoredString('Translated: '.$translate->translate($value),'green','white').PHP_EOL;
                    fclose($ch);
                }
                echo 'All Is Done !'.PHP_EOL;
                exit;
            } else {
                echo 'The copy of your file have failed !';
                exit;
            }

        } else {
            echo 'The original file to translate does not exist !';
            exit;
        }
    }
}
Translate::getArgument();

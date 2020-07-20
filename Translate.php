<?php
declare(strict_types=1);
/*
MIT License

Copyright (c) 2020 Jud3v

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
 */

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
        $help = 'Welcome To Srt PHP Translator !'.PHP_EOL;
        $help .= '© @jud3v https://github.com/jud3v'.PHP_EOL.PHP_EOL;
        $help .= '--help,-help,help Show the current block'.PHP_EOL;
        $help .= '-f language of source'.PHP_EOL;
        $help .= '-d language of destination'.PHP_EOL;
        $help .= '-a file to translate'.PHP_EOL.PHP_EOL;
        $help .= '-q no interaction'.PHP_EOL.PHP_EOL;
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
        $shortopts .= "f:";  // source of file
        $shortopts .= "d:";  // wanted language
        $shortopts .= "a:";  // file to translate
        $shortopts .= "q";  // -quiet no interaction

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
        if (count($options) < 3) {
            echo $color->getColoredString('Required parameter are missing !','white','red').PHP_EOL;
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
    {   $start_time = time();
        $color = new Colors();
        $file = $option['a'];
        $dist = $option['d'];
        $source = $option['f'];

        if (file_exists($file)) {
            $copy = str_replace('.srt','-translated-to-'.$dist.'.srt',$file); //get path of copied file.
            echo 'The path of your translated file is: '.$copy.PHP_EOL;
            $ch = fopen($copy,'w'); // create the missing file with flag f and  remove them content  https://www.php.net/manual/fr/function.fopen.php.
            fclose($ch);
            if (file_exists($copy)) {
                $content = file($file); //content of the original file to translate into the copyied file.
                $i = 0;
                foreach ($content as $key => $value) {
                    $i++;
                    $translate = new Stichoza\GoogleTranslate\GoogleTranslate();
                    $translate->setSource($source);
                    $translate->setTarget($dist);
                    $ch = fopen($copy,'a');
                    if (preg_match('/[\d]+:[\d]+:[\d]+[\d]+.[\d]+[\W][\-][\-][>][\W][\d]+:[\d]+:[\d]+[\d]+.[\d]+/',$value)){
                        $timer = $value;
                    }
                    fwrite($ch, isset($timer) ? $timer : $translate->translate($value).PHP_EOL);
                    if (!isset($option['q'])){
                        echo PHP_EOL;
                        echo $color->getColoredString('Line: '.$i.' | Translating-'.$source.': '. $value,'black','white');
                        echo $color->getColoredString('Line: '.$i.' | Translated-'.$dist.': '.$translate->translate($value).PHP_EOL,'green','white');
                    }
                    fclose($ch);
                }
                echo $color->getColoredString("All Is Done ! \n Time to translate ".$i." lines: in ".(time()-$start_time).' seconds','green','white').PHP_EOL;
                exit;
            } else {
                echo 'The copy of your file have failed !'.PHP_EOL;
                exit;
            }
        } else {
            echo 'The original file to translate does not exist !'.PHP_EOL;
            exit;
        }
    }
}
Translate::getArgument();
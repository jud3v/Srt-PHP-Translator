# Srt-PHP-Translator
this package allowing you to translate .srt files to another language

####Requirements:
#####php-version min: `7+`
#####composer: `required`

#### How to use ?
1. clone last release `git clone https://github.com/judikaelB/Srt-PHP-Translator/tree/v1.0.0`
2. installing dependencies with : ` composer install `
3. use -a=/absolute/path/to/.srt/file 
4. -f=/country-language-code/ `e.g: -f=fr`
5. -d=/wanted-language-code/ `e.g: -d=en`

after the script finish you will see in the path directory (that you previously set in -d option), of the srt file a copy of the original file will the translation.

#### Error ?
If you have any error i will be happy to help us !

#### Contributing ?
Contributing are welcome !

#### Dependencies:
[Stichoza/google-translate-php ](https://github.com/Stichoza/google-translate-php)  
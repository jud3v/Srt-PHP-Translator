# Srt-PHP-Translator
[![CodeFactor](https://www.codefactor.io/repository/github/jud3v/srt-php-translator/badge)](https://www.codefactor.io/repository/github/jud3v/srt-php-translator)
[![Maintainability](https://api.codeclimate.com/v1/badges/3ba6203abe5fe65834ed/maintainability)](https://codeclimate.com/github/jud3v/Srt-PHP-Translator/maintainability)
##### this package translates .srt files to another language

#### Requirements:
1. php-version min: `7+`
2. composer: `required`

#### How to use ?
1. clone last release `git clone https://github.com/judikaelB/Srt-PHP-Translator.git`
2. installing dependencies with : ` composer install `
3. use -a /absolute/path/to/.srt/file 
4. -f lang source of file to translate  `e.g: -f fr`
5. -d the desired language `e.g: -d en`

after the script finish you will see in the path directory (that you previously set in -d option), of the srt file a copy of the original file with the translation.

#### Error ?
If you have any error i will be happy to help us !

#### Contributing ?
Contributing are welcome !

#### Dependencies:
[Stichoza/google-translate-php ](https://github.com/Stichoza/google-translate-php)  

#### known bug:
1. EN to FR the number `10` will be replaced by `dix`, 'google need to fix it'
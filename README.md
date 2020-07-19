## PHP .srt translator
[![CodeFactor](https://www.codefactor.io/repository/github/jud3v/srt-php-translator/badge)](https://www.codefactor.io/repository/github/jud3v/srt-php-translator)
[![Maintainability](https://api.codeclimate.com/v1/badges/3ba6203abe5fe65834ed/maintainability)](https://codeclimate.com/github/jud3v/Srt-PHP-Translator/maintainability)
[![CodeInspector](https://www.code-inspector.com/project/11162/score/svg)](https://www.code-inspector.com/project/11162/score/svg)
[![CodeInspector](https://www.code-inspector.com/project/11162/status/svg)](https://www.code-inspector.com/project/11162/status/svg)

##### this package translates subtitle .srt files to another language

## Requirements:
1. php-version min: `7+`
2. composer: `required`

## Quick Start 
1. clone last release 
```bash 
git clone https://github.com/judikaelB/Srt-PHP-Translator.git
```
2. installing dependencies with : 
```bash 
composer install
```
3. use ```-a``` to set the file to translate ```/absolute/path/to/.srt/file ```
4. use ```-f``` to set language source of file to translate  ```example: -f fr```
5. use ```-d``` to set the desired language ```example: -d en```

## Error ?
Open new issue, I will be happy to help us !

## Contributing

1. Fork it!
2. Create your feature branch: 
```bash
git checkout -b my-new-feature
```
3. Commit your changes: 
```bash 
git commit -am 'Add some feature'
```
4. Push to the branch: 
```bash 
git push origin my-new-feature
```
5. Submit a pull request :D

## Dependencies:
[Stichoza/google-translate-php ](https://github.com/Stichoza/google-translate-php)  

## known bug:
1. EN to FR the number `10` will be replaced by `dix`, 'google need to fix it'
2. Performance : 1000 lines = 15 minutes

## Author
**jud3v** © [srt-php-translator](https://github.com/jud3v), Released under the [MIT](https://github.com/jud3v/Srt-PHP-Translator/blob/master/LICENSE) License.<br>
Authored and maintained by [@Jud3v](https://github.com/jud3v) with help from contributors ([list](https://github.com/jud3v/Srt-PHP-Translator/graphs/contributors)).

> GitHub [@Jud3v](https://github.com/jud3v) · Twitter [@jud3v](https://twitter.com/amjud3v)
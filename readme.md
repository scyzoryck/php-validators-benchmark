# README

Benchmarks of popular PHP Validation libraries. Please keep in mind that libraries provides different features and functionalities - so performance should not be the only one factor to choose libraries for your needs :) 

The result of the benchmark is directly available on travis: https://app.travis-ci.com/github/scyzoryck/php-validators-benchmark

This repository is inspired by [php-serializers/ivory-serializer-benchmark](https://github.com/php-serializers/ivory-serializer-benchmark).

### Available benchmarks
* [beberlei/assert](https://github.com/beberlei/assert)
* [symfony/validator](https://github.com/symfony/validator)
* [webmozarts/assert](https://github.com/webmozarts/assert)
* [illuminate/validation](https://github.com/laminas/laminas-validator)
* [laminas/laminas-validator](https://github.com/laminas/laminas-validator)

## Documentation

To run project locally you need `docker` and `make` setup on your machine. 

### Project structure

To easily manage dependencies in the project, each library has its own directory with `composer.json` located in `benchmarks` directory. Thanks to it every single dependency can be updated separately - without interfering dependencies of different project. 
Shared part (abstract class for benchmarks) is stored in `src` directory. 


### Set up the project

To install dependencies inside all existing directories please run following command: 

```sh
make init 
```

It will install [PHPBench](https://github.com/phpbench/phpbench) in the main directory and separate dependencies for each benchmark. 

To run all benchmarks locally you can run:
```sh
make test // for tests with PHP 8.0
make test-php81 // for tests with PHP 8.1
make test-php82 // for tests with PHP 8.2
```

Composer and PHP are served from separate containers. To run bash in each container you can use `make bash-composer` or `make bash-php` commands.  

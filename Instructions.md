# Instructions for *FooBarQix*

*FooBarQix* may be used in any environment that has PHP: `php service/FooBarQix.php {integer}` where `{integer}` is the value that should be processed.

The same can be done if the environment does not have PHP installed - using *Docker*:

- move to the directory `Docker`: `cd Docker`;
- execute the command `docker-compose run --rm php php service/FooBarQix.php {integer}`.

## Unit tests

To run unit tests, additional actions are required:

- install *Composer*:
  <https://getcomposer.org/doc/faqs/how-to-install-composer-programmatically.md>;
- install necessary libraries: `composer install`;
- run tests: `./vendor/bin/phpunit tests`.

Easier way (if *Docker* is already installed) to run unit tests is using *Docker*:

- move to the directory `Docker`: `cd Docker`;
- execute the command `docker-compose run --rm php ./vendor/bin/phpunit tests`.

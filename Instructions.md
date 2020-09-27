# Instructions

*FooBarQix* and *InfQixFoo* services may be used in any environment that has PHP:

- install *Composer*:
  <https://getcomposer.org/doc/faqs/how-to-install-composer-programmatically.md>;
  additional dependencies may be needed;
- install necessary libraries: `composer install`;
- run services:
  - `php service/FooBarQix.php {integer}`;
  - `php service/InfQixFoo.php {integer}`,

  where `{integer}` is the value that should be processed.

The same can be done if the environment does not have PHP installed - using *Docker*:

- move to the directory `Docker`: `cd Docker`;
- execute the commands:
  - `docker-compose run --rm php php service/FooBarQix.php {integer}`
  - `docker-compose run --rm php php service/InfQixFoo.php {integer}`.

## Unit tests

To run the unit tests:

- run all the tests: `./vendor/bin/phpunit tests`;
- run the tests for *FooBarQix* service:
  `./vendor/bin/phpunit tests/FooBarQixTest.php`.
- run the tests for *InfQixFoo* service:
  `./vendor/bin/phpunit tests/InfQixFooTest.php`.

Easier way (if *Docker* is already installed) to run the unit tests is using *Docker*:

- move to the directory `Docker`: `cd Docker`;
- execute one of these commands:
  - `docker-compose run --rm php ./vendor/bin/phpunit tests`
    to run all the tests;
  - `docker-compose run --rm php ./vendor/bin/phpunit tests/FooBarQixTest.php`
  - to run the tests only for *FooBarQix* service;
  - `docker-compose run --rm php ./vendor/bin/phpunit tests/FooBarQixTest.php`
    to run the tests only for *InfQixFoo* service.

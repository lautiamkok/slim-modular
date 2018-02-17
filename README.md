# Slim Modular

> Creating a modular Slim application.

Read the post [here](https://www.codementor.io/lautiamkok/creating-a-modular-slim-application-gtj9fcxq0?published=1) about this repository.

## Quick Setup

``` bash
# Dependencies
$ composer update

# Production build
$ cd [my-app-name]
$ php -S 0.0.0.0:8181 -t public
```

Then, access the app at http://localhost:8181/

## Dependencies

### General

* [Slim](https://www.slimframework.com/docs/) - A PHP micro framework that helps you quickly write simple yet powerful web applications and APIs.
* [Monolog](https://github.com/Seldaek/monolog) - Sends your logs to files, sockets, inboxes, databases and various web services
* [The League Container (Dependency Injection)](https://github.com/thephpleague/container) - A simple but powerful dependency injection container.
* [ramsey/uuid](https://github.com/ramsey/uuid) - A PHP 5.4+ library for generating RFC 4122 version 1, 3, 4, and 5 universally unique identifiers (UUID).

### Database options

* [Doctrine DBAL](https://github.com/doctrine/dbal) - Powerful database abstraction layer with many features for database schema introspection, schema management and PDO abstraction.
* [Eloquen](https://github.com/illuminate/database) - The Illuminate Database component is a full database toolkit for PHP, providing an expressive query builder, ActiveRecord style ORM, and schema builder.
* [Medoo](https://medoo.in/doc) - The lightest PHP database framework to accelerate development.

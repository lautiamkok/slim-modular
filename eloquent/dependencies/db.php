<?php
// Service factory for the ORM.
// Tell the container how to construct the db.
// https://www.slimframework.com/docs/cookbook/database-eloquent.html
$container->add('Illuminate\Database\Capsule\Manager', function() {
    $dbconfig = require './config/database.php';
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection([
        'driver' => 'mysql',
        'host' => $dbconfig['host'],
        'database' => $dbconfig['name'],
        'username' => $dbconfig['username'],
        'password' => $dbconfig['password'],
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
});

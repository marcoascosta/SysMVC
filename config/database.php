<?php

use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => $_ENV['DB_CONNECTION'],
    'host'      => $_ENV['DB_HOST'],
    'database'  => $_ENV['DB_DATABASE'],
    'username'  => $_ENV['DB_USERNAME'],
    'password'  => $_ENV['DB_PASSWORD'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Seta o Capsule como gerenciador global de Eloquent ORM
$capsule->setAsGlobal();

// Inicia o Eloquent ORM
$capsule->bootEloquent();



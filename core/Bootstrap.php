<?php

use App\Core\App;

App::bind('config', require 'config.php');

/**
 * in above we bind config, and output is Config file's data, like DB info
 * we can bind anything like below is the one example.
 */

// $app = [];

// $app['config'] = require 'config.php';

// $app['database'] = new QueryBuilder(
//     Connection::make($app['config']['database'])
// );

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));


function view($name, $data=[])
{
    extract($data);

    return require "app/views/{$name}.view.php";
}

function redirect($path)
{
    header("Location: /{$path}");
}
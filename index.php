<?php
session_start();
require 'vendor/autoload.php';
require 'core/Bootstrap.php';

// use App\Core\{Router, Request};
use App\Core\Router;
use App\Core\Request;

// $router = new Router;

// require 'routes.php';



// require $router->direct($uri);


// $router= Router::load('routes.php');

// require $router->direct($uri);



Router::load('app/routes.php')
    
    ->direct(Request::uri(), Request::method());
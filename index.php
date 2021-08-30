<?php


$query = require 'core/bootsrap.php';

$routes = new Router;
require 'routes.php';


// // var_dump($_SERVER['REQUEST_URI']);    //.1)

$uri = trim($_SERVER['REQUEST_URI'], '/');    //cut this line and inset into request file in uri function

// //.2) (you can see using this /,in our browser front / is removed)

require $routes->direct($uri);
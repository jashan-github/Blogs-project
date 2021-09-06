<?php

namespace App\Core;

Class Router
{   
    public $routes=[
        'GET'=>[],
        'POST' =>[]
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;

    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    // public function define ($routes)
    // {
    //     $this->routes=$routes;
    // }

    public function direct($uri, $requestType)
    {         
        /**
         * output is: string(0) "" string(3) "GET"
         * means uri is nothing like localhost:8888/  and requestType is GET request.
         */

        if(array_key_exists($uri, $this->routes[$requestType]))
        {
            // die($this->routes[$requestType][$uri]);
            /**
             * if we die above code line then
             * output is: PagesController@home which we declared in routes.php file
             */  
            
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
                // ... its an operator and explode is an function who breaks the string.
            );
            // die(var_dump($uri, $requestType));
        }
            throw new \Exception('No routes defined for this URI');
    }

    /**
     * the callAction function works what is the controller and what is the action.
     */
    protected function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        
        $controller = new $controller;

        if(!method_exists($controller, $action))
        {
            throw new \Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }
        return $controller->$action();
    }
}                                             
<?php

namespace App\Core;

class Request
{
    public static function uri()
    {
        
        // return trim($_SERVER['REQUEST_URI'], '/');

        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    public static function method()
    {
        /**
         * it indicates when the request method is get or post.
         */
        return $_SERVER['REQUEST_METHOD'];
    }
}
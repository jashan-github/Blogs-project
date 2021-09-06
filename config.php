<?php

return [
    'database'=>[
        'name'=> 'test_database',
        'username'=> 'root',
        'password'=> '',
        'connection'=> 'mysql:host=localhost',
        'options'=> [
            PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION 
        ]
    ]
];
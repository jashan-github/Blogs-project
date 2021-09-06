<?php 

function prd($arr)
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    exit;
}

class Connection
{
    public static function make($config)
    {
        try
        {
            // return new PDO('mysql:host=localhost; dbname=laracast_php', 'root', '');
            // echo "connection successfully";
            return new PDO(
                $config['connection'].
                ';dbname='.$config['name'],
                $config['username'],
                $config['password'],
                $config['options'],
            );  
            
        }
            catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }
}


// $connection =new connection();
// $connection->make();
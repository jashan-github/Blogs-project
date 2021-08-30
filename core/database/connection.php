<?php

class Connection
{
    public static function make()
    {
        try
        {
            $pdo= new PDO('mysql:host=localhost; dbname=blogs_project', 'root', '');
            // echo "connection successfully";
        }
        catch(PDOException $e){
            echo "connection not successfully";
            die($e->getMessage());
        }
    }
    
}
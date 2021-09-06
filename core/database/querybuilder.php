<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo=$pdo;
    }

    // Auth login function
    public function auth_login($email , $password, $table)
    {
        $sql = "select * from $table where email = '".$email."' and password = '".$password."'";
        
        $stmt = $this->pdo->query($sql);
        $stmt->execute();
        
        $userData= $stmt->fetch(PDO::FETCH_OBJ);
        
        if(!empty($userData))
        {
            $userData = (array) $userData;
            unset($userData['password']);
            $_SESSION['userData'] = $userData;            
        }        
        return $userData;
    }

    // selectAll function for show the all data from the db.
    public function selectAll($table)
    {
        $stmt = $this->pdo->prepare("select * from {$table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    // insert function for add new data in db

    public function insert($table, $parameters)
    {
        /**
         * insert into users table like(name,email) values(:name, :email)
         * for example name,email (values ('jashan'))
         * insert into %s (%s) values (%s)
         * %s means string.
         * insert into %tbl (%colmn) values(%values)
         */
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        try 
        {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (\Exception $e) {
            echo $e->getMessage();die;
        }
    }

    //delete the data from the db.

    public function remove($table, $id)
    {   
        $sql = "delete from {$table} WHERE $id = :id";
        
    }
    

    // update the data.
    public function update()
    {
        
    }
}
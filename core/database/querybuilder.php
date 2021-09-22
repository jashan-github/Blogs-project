<?php

use DevCoder\SessionManager;

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
        $sessionManager = new SessionManager();
        
        if(!empty($userData))
        {
            $userData = (array) $userData;
            unset($userData['password']);
            $sessionManager->set('userData', $userData);          
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

    public function select($table, $id)
    {
        $sql = "select * from {$table} WHERE id = '".$id."' ";
        $stmt = $this->pdo->query($sql);
        $stmt->execute();
        
        $userData= $stmt->fetch(PDO::FETCH_OBJ);
        return $userData;        
    }

    public function fetchUserBlogs($table, $id)
    {
        $sql = "select * from {$table} WHERE user_id = '".$id."' ";
        $stmt = $this->pdo->query($sql);
        $stmt->execute();        
        return $stmt->fetchAll(PDO::FETCH_CLASS);
         
    }

    // insert function for add new data in db

    public function insert($table, $parameters)
    {
        /**
         * insert into users table like(name,email) values(:name, :email)
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

    function update($table, $data, $where){
        $cols = array();

        foreach($data as $key=>$val) {
            $cols[] = "$key = '$val'";
        }
        
        // update users set userid = $userid, bank_name = $bankname , fname = $fname where usrid = 1
        
        $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";
        $stmt = $this->pdo->query($sql);
        $result = $stmt->execute();
        return $result;
    }

    //delete the data from the db.

    public function remove($table, $id)
    {  
        $sql = "delete from $table WHERE id = '".$id."'";
        $stmt = $this->pdo->query($sql);
        $deleted = $stmt->execute();        
    }
}
<?php

namespace App\Controllers;

use App\Core\App;
use DevCoder\SessionManager;

class AuthController
{
    public function login()
    {
        $sessionManager = new SessionManager();
        if(isset($_POST['login']))
        {
            $email= $_POST['email'];
            $password = md5($_POST['password']);
            $data=$_POST;
            
            if(!empty($data['email'])){
                $result = App::get('database')->auth_login($email, $password,"users");
                if(!empty($result))
                {
                    return redirect('dashboard');
                }else
                { 
                    $sessionManager->set("error","E-mail address or Password is Wrong.");
                    return view('login');
                }
            }else{
                $sessionManager->set("error","E-mail address or Password Cannot be Empty.");
                    return view('login');
            }  
                      
        }
        else
        {
            $sessionManager->set("error","Please enter your email address and password.");
           return view('login');
        }
    }

    public function dashboard()
    {
        $sessionManager = new SessionManager();
        $userData = $sessionManager->get("userData");
        
        if(!empty($userData)){
            $role = $userData['role_id'];
            if($role=="1"){
                $blogList = App::get('database')->selectAll('blogs');
                
            }else{
                $user_id = $userData['id'];
                $blogList = App::get('database')->fetchUserBlogs("blogs", $user_id);                
            }
            $blogs =  array();
            if(!empty($blogList)){
                
                foreach($blogList as $key=>$values){                    
                    $userid = $values->user_id;
                    $userData =  App::get('database')->select("users", $userid);                    
                    $values->blogger = $userData->name;
                    $blogs[$key] = (array) $values;
                }                
            }
            $dataArray = array(
                "blogList"=> $blogs
            );
            if($role == "1"){
                $sessionManager->set("message","Welcome to the admin dashboard.");
            }else{                
                $sessionManager->set("message","Welcome to the user dashboard.");                
            }
            return view('dashboard', $dataArray);   

        }else
        {
            return redirect('login');
        }

    }
    public function logout()
    {
        session_destroy();
        return redirect('');
    }
}
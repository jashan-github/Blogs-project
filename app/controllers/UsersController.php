<?php

namespace App\Controllers;

use App\Core\App;

class UsersController
{
    public function home()
    {
        return view('index');
        // $users = App::get('database')->selectAll('users');
    
        // return view('users',compact('users'));
    }

    public function store()
    {
        /**
         * insert the users 
         * 
         * and redirect to the all users page
         */
        App::get('database')->insert('users',[
            'name' => $_POST['name']
        ]);

        return redirect('users');
    }

    public function login()
    {
        if(!empty($_POST)){
            
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            
            $isExists = App::get('database')->auth_login($email, $password,"users");
            
            if(isset($_SESSION['userData']))
            {
                if(!empty($_SESSION['userData']['role_id']))
                {
                    return $_SESSION['userData']['role_id'] == 1 ? redirect("admin-dash") : redirect("user-dash");
                }
                else
                {
                    $_SESSION['error']="Username and password is invalid";
                    return redirect(('admin-login'));
                }

            }
            // else{
            //     $_SESSION['error']="Fill the all fields";
            //     return redirect(('admin-login'));
            // }
        }else if(isset($_SESSION['userData']))
        {
            return redirect('admin-dash');
        }else{
            $_SESSION['error']="Fill the all fields";
            return view('admin/admin-login');
        }
    }


    public function admindash()
    {
        if(!isset($_SESSION['userData']))
        {
            $_SESSION['error'] = "Please get login";
            return view('admin/admin-login');    
        }
        return view('admin/admin-dash');
    }

    public function logout()
    {
        session_destroy();
        return redirect('admin-login');
    }
}
<?php

namespace App\Controllers;

use App\Core\App;

class AuthController
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

    }

    public function userdash()
    {
        
    }
    public function logout()
    {
        session_destroy();
        return redirect('admin-login');
    }
}
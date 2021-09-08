<?php

namespace App\Controllers;

use App\Core\App;

class UserCrudController
{
    public function show()
    {
        $members = App::get('database')->selectAll('users');

        return view('admin/members', compact('members'));
    }

    public function showform()
    {
        return view('admin/add-member');
    }

    public function store()
    {
        App::get('database')->insert('users',[
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'password' => md5($_POST['password'])
        ]);
        
        return redirect('members');
    }

    public function delete()
    {
        App::get('database')->remove('users',[
            'id' => $_GET['id']
        ]);

        return view('admin/members', compact('members'));
    }  
}
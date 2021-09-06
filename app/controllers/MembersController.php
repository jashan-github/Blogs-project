<?php

namespace App\Controllers;

use App\Core\App;

class MembersController
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
            'password' => md5($_POST['password']),
            // 'confirm_password' => md5($_POST['confirm_password']),
            //'role_id' => 2
        ]);
        
        return redirect('members');
    }

    public function delete()
    {
        $members = App::get('database')->remove('users');

        return view('admin/members', compact('members'));
    }
}
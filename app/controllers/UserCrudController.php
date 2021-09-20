<?php

namespace App\Controllers;

use App\Core\App;
use DevCoder\SessionManager;

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

    public function edit(){
        $sessionManager = new SessionManager();
        $table = "users";
        if(!empty($_POST)){

            $id = $_POST['id'];           
            $where = 'id='.$id;            
            $save = App::get('database')->update($table, $_POST, $where);
            $sessionManager->set("message","Member is updated successfully");
            return redirect('members');

        }else{
            $id = $_GET['id'];
            $memberData =  App::get('database')->select($table, $id);
            
            return view('admin/edit-member', compact('memberData'));
        }
        
    }

    public function delete(){
        
        App::get('database')->remove('users', $_GET['id']);

        return redirect('members');
    }  
}
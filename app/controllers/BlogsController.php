<?php

namespace App\Controllers;
use DevCoder\SessionManager;

use App\Core\App;

class BlogsController
{
    /** This method is used for title of blogs shown on public index page. */

    public function show()
    {
        $blogs = App::get('database')->selectAll('blogs');

        $sessionManager = new SessionManager();
        $userData = $sessionManager->get("userData");
        if(!empty($userData))
        {
            $role = $userData['role_id'];
            if($role == "1")
            {
                return view('dashboard', compact('blogs'));
            }
            else
            {
                return view('dashboard', compact('blogs'));
            }
        }
        else
        {
            return view('index', compact('blogs'));
        }
    }

    /** This method is used for add blog form shown */
    public function showform()
    {
        return view('blog/add-blog');
    }

    public function insert(){
        $sessionManager = new SessionManager();
        $userData = $sessionManager->get("userData");
        
        App::get('database')->insert('blogs',[
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'user_id' => $userData['id']
        ]);
        
        return redirect('dashboard');
    }

    public function view(){
        // $sessionManager = new SessionManager();
        // $userData = $sessionManager->get("userData");
        $blog_id = $_GET['id'];
        $result = App::get('database')->select('blogs',$blog_id);   
        prd($result);
    }

    // Edit the Existing Blog.

    public function blogedit()
    {
        $sessionManager = new SessionManager();
        $table = "blogs";
        if(!empty($_POST))
        {
            $id = $_POST['id'];           
            $where = 'id='.$id;            
            $result = App::get('database')->update($table, $_POST, $where);
            $sessionManager->set("message","Blog is updated successfully");
            return redirect('dashboard');

        }else{
            $id = $_GET['id'];
            $blogData =  App::get('database')->select($table, $id);            
            return view('blog/edit-blog', compact('blogData'));
        }
    }

    // Delete Blog
    public function delete()
    {
        App::get('database')->remove('blogs', $_GET['id']);

        return redirect('dashboard');
    }
}
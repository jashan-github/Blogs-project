<?php

namespace App\Controllers;

use App\Core\App;

class BlogsController
{
    public function show()
    {
        $blogs = App::get('database')->selectAll('blogs');

        return view('blog/blogs', compact('blogs'));
    }

    public function showform()
    {
        return view('blog/add-blog');
    }

    public function insert()
    {
        App::get('database')->insert('blogs',[
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ]);
        
        return redirect('blogs');
    }
}
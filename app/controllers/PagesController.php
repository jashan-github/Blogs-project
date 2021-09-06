<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    // this function for home page.
    public function home()
    {
        /**
         * Recevie the request.
         * Delegate.
         * Return a Response of the Request.
         */
        $tasks = App::get('database')->selectAll('todos');

        // return view('index', ['tasks' =>$tasks]);
        return view('index', compact('tasks'));
        /**
         * this code from index controller,we make as starting of the course.
         * we don't need to create different controller,we just need to create methods in a single controller.
         */
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');

    }

    
}
<?php

namespace App\Controllers;

use App\Core\App;
use DevCoder\SessionManager;

class HomepageController
{
    /** main home page */
    public function index(){
        return view('index');
    }
    public function blogs()
    {
        /** This method is used for title of blogs shown on public index page. */
        $sessionManager = new SessionManager();        
        $userData = $sessionManager->get("userData");
       
        if(empty($userData))
        {
            $blogs = App::get('database')->selectAll('blogs');
        }
        if(!empty($blogs))
        {
            foreach($blogs as $key=>$values){
                $values=  (array) $values;
                $user_id = $values['user_id'];
                $userData =  App::get('database')->select("users", $user_id);                    
                $values['blogger'] = $userData->name;
                $blogs[$key] = (array) $values;
            }            
        }
        $dataArray = array(
            "blogs"=>$blogs
        );
        return view('blogs', $dataArray);
        // return view('index');
    }

    public function publicview()
    {
        $blog_id = $_GET['id'];
        $publicData = App::get('database')->select('blogs',$blog_id);   
        return view('publicblog', compact('publicData'));
    }
}
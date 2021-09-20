<?php

// main home page.
$router->get('', 'AuthController@home');

// $router->post('users', 'AuthController@store');

// login 
$router->get('login', 'AuthController@login');
$router->post('login', 'AuthController@login');

// ** Dashboard **
$router->get('dashboard', 'AuthController@dashboard');

// Logout 
$router->get('logout', 'AuthController@logout');

//Members Controller

// show the listing of the members(member.view.php)
$router->get('members', 'UserCrudController@show');

// show the form to add a new member through add method.
$router->get('add-member', 'UserCrudController@showform');

// adding a new member.
$router->post('add-member', 'UserCrudController@store');

$router->get('edit-member', 'UserCrudController@edit');
$router->post('edit-member', 'UserCrudController@edit');

$router->get('delete-member', 'UserCrudController@delete');

// member dashboard


//Blogs Routes

//public view blog page
$router->get('blogs', 'BlogsController@show');
$router->get('admin-blogs', 'BlogsController@show');
$router->get('user-blogs', 'BlogsController@show');

// Add a New Blog.
$router->get('add-blog', 'BlogsController@showform');
$router->post('add-blog', 'BlogsController@insert');

// View the blog through VIEW Button.
$router->get('view-blog', 'BlogsController@view');

// Delete Blog.
$router->get('delete-blog', 'BlogsController@delete');

// Edit the Existing Blog.
$router->get('edit-blog', 'BlogsController@blogedit');
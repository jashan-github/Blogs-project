<?php
// $router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');

// main home page.
$router->get('', 'AuthController@home');

// $router->post('users', 'AuthController@store');

// login 
$router->get('admin-login', 'AuthController@login');
$router->post('admin-login', 'AuthController@login');


$router->get('admin-dash', 'AuthController@admindash');

$router->get('user-dash', 'AuthController@userdash');

// Logout 
$router->get('logout', 'AuthController@logout');

//Members Controller
// show the listing of the members(member.view.php)
$router->get('members', 'UserCrudController@show');

// show the form to add a new member through add method.
$router->get('add-member', 'UserCrudController@showform');

// adding a new member.
$router->post('add-member', 'UserCrudController@store');


$router->delete('member', 'UserCrudController@delete');

// member dashboard


//Blogs Routes

$router->get('blogs', 'BlogsController@show');
$router->get('add-blog', 'BlogsController@showform');
$router->post('add-blog', 'BlogsController@insert');
<?php
// $router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');

// main home page.
$router->get('', 'UsersController@home');

// $router->post('users', 'UsersController@store');

// login 
$router->get('admin-login', 'UsersController@login');
$router->post('admin-login', 'UsersController@login');


$router->get('admin-dash', 'UsersController@admindash');

// Logout 
$router->get('logout', 'UsersController@logout');

//Members Controller
// show the listing of the members(member.view.php)
$router->get('members', 'MembersController@show');

// show the form to add a new member through add method.
$router->get('add-member', 'MembersController@showform');

// adding a new member.
$router->post('add-member', 'MembersController@store');


//$router->get('members', 'MembersController@delete');
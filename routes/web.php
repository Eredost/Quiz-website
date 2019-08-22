<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get("/",
    array(
        "uses" => "MainController@home",
        "as"   => "home-page"
));

$router->get("/signup",
    array(
        "uses" => "UserController@signUp",
        "as"   => "signup-page"
));

$router->get("/signin",
    array(
        "uses" => "UserController@signIn",
        "as"   => "signin-page"
));

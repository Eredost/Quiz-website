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

$router->post("/signup",
    array(
        "uses" => "UserController@signUp",
        "as"   => "signup-post"
));

$router->get("/signin",
    array(
        "uses" => "UserController@signIn",
        "as"   => "signin-page"
));

$router->post("/signin",
    array(
        "uses" => "UserController@signIn",
        "as"   => "signin-post"
));

$router->get("/logout",
    array(
        "uses" => "UserController@logOut",
        "as"   => "logout-page"
));

$router->get("/quiz/{quizId}",
    array(
        "uses" => "QuizController@quiz",
        "as"   => "quiz-page"
));

$router->post("/quiz/{quizId}",
    array(
        "uses" => "QuizController@quiz",
        "as"   => "quiz-post"
));

$router->get("/tags",
    array(
        "uses" => "TagController@tags",
        "as"   => "tags-page"
));

$router->get("/tags/{tagId}/quiz",
    array(
        "uses" => "TagController@quiz",
        "as"   => "tag-quiz-page"
));

$router->get("/account",
    array(
        "uses" => "UserController@profile",
        "as"   => "profile-page"
));

$router->get("/admin",
    array(
        "uses" => "AdminController@admin",
        "as"   => "admin-page"
));

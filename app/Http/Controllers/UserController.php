<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function signUp(Request $request)
    {
        return view("signup");
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function signIn(Request $request)
    {
        return view("signin");
    }
}

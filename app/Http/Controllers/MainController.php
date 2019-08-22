<?php


namespace App\Http\Controllers;


class MainController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view("home");
    }
}

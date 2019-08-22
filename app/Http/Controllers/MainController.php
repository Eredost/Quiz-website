<?php


namespace App\Http\Controllers;


use App\Models\Quiz;

class MainController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function home()
    {
        $quizzes = Quiz::all();

        return view("home",
            array(
                "quizzes" => $quizzes
        ));
    }
}

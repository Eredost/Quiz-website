<?php


namespace App\Http\Controllers;


use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * @param Request $request
     * @param $quizId
     * @return \Illuminate\View\View
     */
    public function quiz(Request $request, $quizId)
    {
        $score = $userResponses = 0;
        $quiz = Quiz::find($quizId);
        $answers = Question::join("answers", "questions.id", "=", "answers.questions_id")
                                ->select("answers.*")->where("questions.quizzes_id", $quizId)->get();
        $answers = $answers->shuffle();

        if ($request->isMethod("post")) {

            $userResponses = $request->input();

            foreach($quiz->questions as $question) {

                if (in_array($question->answers_id, $userResponses)) $score++ ;
            }
        }

        return view("quiz",
            array(
                "quiz"    => $quiz,
                "answers" => $answers,
                "request" => $request,
                "score"   => $score,
                "userRes" => $userResponses
        ));
    }
}

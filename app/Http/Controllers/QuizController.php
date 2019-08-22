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
        $quiz = Quiz::find($quizId);

        $tags = Quiz::join("quizzes_has_tags", "quizzes.id", "=", "quizzes_has_tags.quizzes_id")
                        ->join("tags", "quizzes_has_tags.tags_id", "=", "tags.id")
                        ->select("tags.*")->where("quizzes.id", "=", $quizId)->get();

        $questions = Question::all()->where("quizzes_id", $quizId);

        $answers = Question::join("answers", "questions.id", "=", "answers.questions_id")
                                ->select("answers.*")->where("questions.quizzes_id", $quizId)->get();

        return view("quiz",
            array(
                "quiz"      => $quiz,
                "tags"      => $tags,
                "questions" => $questions,
                "answers"   => $answers
        ));
    }
}

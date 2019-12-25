<?php


namespace App\Http\Controllers;


use App\Mail\Result;
use App\Models\Question;
use App\Models\Quiz;
use App\Utils\UserSession;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

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
                                ->select("answers.*")->where("questions.quizzes_id", $quizId)
                                ->inRandomOrder()->get();

        if ($request->isMethod("post")) {

            if (UserSession::isConnected()) {

                $userResponses = $request->input();

                foreach ($quiz->questions as $question) {

                    if (in_array($question->answers_id, $userResponses)) $score++;
                }

                $user = UserSession::getUser();
                //Mail::to($user)->send(new Result($quiz, $answers, $score, $userResponses, $user));
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

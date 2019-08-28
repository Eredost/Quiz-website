<?php


namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Result extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Variable containing the quiz accorded to the id given in url.
     *
     * @var \App\Models\Quiz
     */
    public $quiz;

    /**
     * The answers of the questions related to the quiz.
     *
     * @var \App\Models\Question
     */
    public $answers;

    /**
     * The total score of the user.
     *
     * @var int
     */
    public $score;

    /**
     * The user responses to the quiz.
     *
     * @var array
     */
    public $userRes;

    /**
     * The user who played the quiz.
     *
     * @var \App\Models\AppUser
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($quiz, $answers, $score, $userRes, $user)
    {
        $this->quiz    = $quiz;
        $this->answers = $answers;
        $this->score   = $score;
        $this->userRes = $userRes;
        $this->user    = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('from@example.com')
                    ->view('emails.results');
    }
}

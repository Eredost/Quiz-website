<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quizzes';

    /**
     * Get the user that owns the quiz.
     */
    public function app_users()
    {
        return $this->belongsTo('App\Models\AppUser');
    }
}

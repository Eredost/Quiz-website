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

    /**
     * Get the questions associated to the quiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'quizzes_id');
    }

    /**
     * Get the tags associated to the quiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'quizzes_has_tags', 'quizzes_id', 'tags_id');
    }
}

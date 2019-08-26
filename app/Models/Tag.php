<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Get the quizzes associated to the tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function quizzes()
    {
        return $this->belongsToMany('App\Models\Quiz', 'quizzes_has_tags', 'tags_id', 'quizzes_id');
    }
}

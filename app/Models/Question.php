<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * Get the level that is associated with the question.
     */
    public function levels()
    {
        return $this->belongsTo('App\Models\Level');
    }
}

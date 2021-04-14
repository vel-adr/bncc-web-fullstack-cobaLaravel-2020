<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['content', 'question_id', 'profile_id'];

    public function question()
    {
        return $this->belongsTo('App\Question', 'question_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'profile_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'content', 'correct_answer_id', 'profile_id'];
    protected $hidden = ['created_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'profile_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}

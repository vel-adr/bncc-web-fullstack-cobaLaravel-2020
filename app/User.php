<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['full_name', 'email', 'photo'];

    public function question()
    {
        return $this->hasMany('App\Question');
    }
}

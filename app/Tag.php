<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag_name'];

    public function questions()
    {
        return $this->belongsToMany('App\Question');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    protected $fillable = ['user_id','joke_id'];

    /** Relationships */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function joke()
    {
        return $this->belongsTo('App\Joke');
    }
}

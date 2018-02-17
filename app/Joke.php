<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
    protected $table = 'jokes';
    protected $fillable = [ 'title','joke'];


    /** Methods */
 

    /** Relationship */
    public function user(){  
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}

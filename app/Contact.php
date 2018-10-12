<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Contact extends Model 
{
    public function user()
    {
        return $this->belongsTo('App\user');
    }
    public function opportunity()
    {
        return $this->hasMany('App\opportunity');
    }
}
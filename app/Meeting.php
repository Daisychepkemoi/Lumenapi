<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model 
{
    public function opportunity()
    {
        return $this->belongsTo('App\Opportunity');
    }
}


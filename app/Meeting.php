<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model 
{
	 protected $fillable = [
        'place','opportunity_id','location','status'
    ];
    public function opportunity()
    {
        return $this->belongsTo('App\Opportunity');
    }
     public function contact()
    {
        return $this->belongsToMany('App\Contact');
    }
}


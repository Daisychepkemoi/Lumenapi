<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model 
{
    public function contact()
    {
      return $this->belongsTo('App\Contact');  
    }
    public function meeting()
    {
        return $this->hasMany('App\Meeting');
    }
    
}

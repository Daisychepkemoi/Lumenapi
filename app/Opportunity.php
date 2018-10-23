<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model 
{
	 protected $fillable = [
        'contact', 'sales_executive','status','description','value','meetings'
    ];
    public function contact()
    {
      return $this->belongsTo('App\Contact');  
    }
    public function meeting()
    {
        return $this->hasMany('App\Meeting');
    }
    
}

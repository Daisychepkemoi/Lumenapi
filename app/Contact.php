<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Contact extends Model 
{
	 protected $fillable = [
        'name', 'email','phone','address','company','title','notes','meetings','opportunities','user_id','prefered_notification_method'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function opportunity()
    {
        return $this->hasMany('App\Opportunity');
    }
    public function meeting()
    {
        return $this->hasMany('App\Meeting');
    }

}

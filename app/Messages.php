<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Messages extends Model 
{
	 protected $fillable = [
        'type', 'subject','body','recipient','sender'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
}

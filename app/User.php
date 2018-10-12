<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

        protected $fillable = [
        'name', 'email',
    ];

    
    protected $hidden = [
        'password',
    ];
    public function contact()
    {
        return $this->hasMany('App\Contact');
    }
    public function account()
    {
        return $this->hasOne('App\Account');
    }
    public function messages()
    {
        return $this->hasMany('App\Messages');
    }
}

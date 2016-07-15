<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','first_name','last_name', 'email', 'password', 'created_at','updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','deleted_flag'
    ];



     public function getRememberToken()
     {
       return null; // not supported
     }

     public function setRememberToken($value)
     {
       // not supported
     }

     public function getRememberTokenName()
     {
       return null; // not supported
     }

     /**
      * Overrides the method to ignore the remember token.
      */
     public function setAttribute($key, $value)
     {
       $isRememberTokenAttribute = $key == $this->getRememberTokenName();
       if (!$isRememberTokenAttribute)
       {
         parent::setAttribute($key, $value);
       }
     }

}

<?php

namespace App\ShopModels;

use Illuminate\Database\Eloquent\Model;

class User extends \Illuminate\Foundation\Auth\User
{
    //
     protected $fillable =['name','password','shop_id','email','status','remember_token'];
}

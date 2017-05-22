<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

//class Classroom extends Model
class Class_subscription extends Authenticatable
{
  	protected $guard = 'user';
  	protected $fillable = [
  		'classroom_id', 'user_id', 'subscription_id'        
    ];

}


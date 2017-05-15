<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

//class Classroom extends Model
class Classroom extends Authenticatable
{
   // protected $gurad = 'superadmin';
	 protected $guard = 'teacher';

	  protected $fillable = ['class_name'];
}

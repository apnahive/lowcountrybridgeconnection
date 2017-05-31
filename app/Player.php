<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

//class Game extends Model
class Player extends Authenticatable
{
    protected $guard = 'teacher';

     protected $fillable = ['firstname', 'lastname', 'email', 'user_id', 'added_by_teacher', 'added_by_manager'];
}

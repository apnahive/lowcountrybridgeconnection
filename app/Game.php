<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

//class Game extends Model
class Game extends Authenticatable
{
    protected $guard = 'manager';
}

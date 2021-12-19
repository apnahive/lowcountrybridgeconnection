<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

//class Game extends Model
class Special_game extends Authenticatable
{
    protected $guard = 'manager';
}

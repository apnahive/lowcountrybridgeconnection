<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
   // protected $gurad = 'superadmin';
	  protected $fillable = [
	  'class_name', 'club_name', 'class_description', 'class_from', 'class_till', 'class_size', 'payment_option', 'class_flyer_address'
    ];
}



<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maritalstatus extends Model
{
    public function users() {
    	return $this->hasMany('App\Users');
    }
}

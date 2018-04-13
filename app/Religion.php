<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    public function users() {
    	return $this->hasMany('App\Users');
    }
}

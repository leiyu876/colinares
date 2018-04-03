<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function partner() {
        return $this->find($this->married_to);
    }

    public function children() {

        return $this->where('parent_id', $this->id)->orderBy('birthday', 'asc')->get();
    }

    public function siblings() {

        $parent = $this->find($this->parent_id);
        
        if(!$parent) {
            
            return array();
        }

        return $parent->children();
    }

    /**
     * Accessor for Age.
     */
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birthday'])->age;
    }
}

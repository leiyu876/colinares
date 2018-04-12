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

    public function genders() {
        return $this->belongsTo('App\Gender', 'gender', 'code');
    }

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

    public function parents() {

        if(!$this->parent_id) {
            return array('one'=>[],'two'=>[]);
        }

        $parent = $this->find($this->parent_id);

        $parents = array(
            'one' => $parent,
            'two' => $parent->partner()
        );

        return $parents;
    }

    public function tree_breadcrumbs() {

        $id = '';

        $ids = $this->compose_crumbs_id($id, $this); 

        $ids = explode(',', $ids);       
    
        $persons = array();

        foreach ($ids as $id) {
            $persons[] = $this->find($id);
        }

        return $persons;
    }

    /**
     * Accessor for Age.
     */
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birthday'])->age;
    }

    private function compose_crumbs_id($id, $user) {

        if (!$user->parent_id) { // our base case
            return $user->id.$id;
        } else {
            $parent = $this->find($user->parent_id);            
            return $this->compose_crumbs_id($id, $parent).$id.','. $user->id; // <--calling itself.
        }
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address','phone','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }

    public function hasAnyRoles(array $roles)
    {
        $roles = $this->roles()->whereIn('name',$roles)->first();
        if($roles){
            return $roles;
        }
        return false;
    }

    public function hasRoles($roles)
    {
        $roles = $this->roles()->where('name',$roles)->first();
        if($roles){
            return $roles;
        }
        return false;
    }

    public function  authorizeRoles($role)
    {
        if(is_array($role)){
            return $this->hasAnyRoles($role);
        }
        return $this->hasRoles($role);
    }
}

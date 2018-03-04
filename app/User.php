<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'about', 'confirmation_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the blogs record associated with the user.
     */
    public function blog()
    {
        return $this->hasMany('App\Blog');
    }

    /**
     * Get the category record associated with the user.
     */
    public function category()
    {
        return $this->hasMany('App\Category');
    }

    /**
     * The Roles that belong to the Users.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('role', $role)->first();
    }
}

<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function scores()
    {
        return $this->hasMany('App\Score');
    }

    public function isTeacher()
    {
        if ($this->role === 'teacher')
            return true;

        return false;
    }

    public function scopeStudent($query)
    {
        return $query->where('role', '!=', 'teacher');
    }
}

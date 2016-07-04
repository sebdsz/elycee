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
        'username', 'email', 'password', 'role',
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

    public function inClass()
    {
        switch ($this->role) {
            case 'first_class' :
                return 'Première S';
                break;
            case 'final_class' :
                return 'Terminale S';
                break;
            default :
                return 'Erreur';
                break;
        }
    }

    public function scopeStudent($query)
    {
        return $query->where('role', '!=', 'teacher');
    }

    public function scopeLast($query, $limit = 3)
    {
        return $query->orderBy('created_at', 'DESC')->take($limit);
    }
}

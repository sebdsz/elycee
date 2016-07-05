<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = [
        'title', 'content', 'class_level', 'status',
    ];

    public function choices()
    {
        return $this->hasMany('App\Choice');
    }

    public function scores()
    {
        return $this->hasMany('App\Score');
    }

    public function scopePublish($query)
    {
        return $query->where('status', 1);
    }

    public function scopeLast($query, $limit = 3)
    {
        return $query->orderBy('created_at', 'DESC')->take($limit);
    }

    public function getClassLevelAttribute($value)
    {
        switch ($value) {
            case 'first_class' :
                return 'Première S';
                break;
            case 'final_class' :
                return 'Terminale S';
                break;
            default :
                return '';
        }
    }
}

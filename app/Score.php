<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{

    protected $fillable = [
        'user_id', 'question_id', 'note',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}

<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'date', 'user_id', 'post_id', 'content', 'status',
    ];

    protected $dates = ['date'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ago()
    {
        return Carbon::parse($this->date)->diffForHumans(Carbon::now(), true);
    }
}

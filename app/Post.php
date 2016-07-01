<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function excerpt($words = 20)
    {
        return Str::words($this->content, $words);
    }
}

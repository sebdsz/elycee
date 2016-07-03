<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title', 'content', 'date', 'abstract', 'status', 'url_thumbnail', 'user_id',
    ];

    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setDateAttribute($date)
    {
        $date = str_replace('/', '-', $date);
        $date = Carbon::parse($date);
        $this->attributes['date'] = $date;
    }

    public function excerpt($words = 20)
    {
        return Str::words($this->content, $words);
    }
}

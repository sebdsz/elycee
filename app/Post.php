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

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function fullDate()
    {
        $date = str_replace('/', '-', $this->date);

        return utf8_encode(Carbon::parse($date)->formatLocalized('%e %B %Y'));
    }

    public function setDateAttribute($date)
    {
        $date = str_replace('/', '-', $date);
        $this->attributes['date'] = Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function url_thumbnail()
    {
        return url('uploads' . DIRECTORY_SEPARATOR . $this->id . DIRECTORY_SEPARATOR . $this->url_thumbnail);
    }

    public function excerpt($words = 20)
    {
        return Str::words($this->content, $words);
    }

    public function scopeLast($query, $limit = 3)
    {
        return $query->orderBy('date', 'DESC')->take($limit);
    }

    public function scopePublish($query)
    {
        return $query->where('status', 1)->orderBy('date', 'DESC');
    }
}

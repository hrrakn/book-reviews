<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookstore extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'place',
        'time',
        'url',
        'img',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}

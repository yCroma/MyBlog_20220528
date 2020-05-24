<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'draft'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'asc');
    }
}

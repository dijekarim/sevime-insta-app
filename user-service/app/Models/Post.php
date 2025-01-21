<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Post extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = ['user_id', 'image', 'caption'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class, 'post_id', '_id');
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class, 'post_id', '_id');
    }
}

<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PostComment extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = ['post_id', 'user_id', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', '_id');
    }
}

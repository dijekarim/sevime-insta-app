<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PostLike extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'user_id',
        'post_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }
}

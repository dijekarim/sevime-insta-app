<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as EloquentModel;

class Follower extends EloquentModel
{
    protected $connection = 'mongodb';
    protected $collection = 'followers';

    protected $fillable = ['user_id', 'follower_id', 'created_at'];

    // User being followed
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }

    // User who is following
    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id', '_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    protected $collection = 'users';
    protected $connection = 'mongodb';
    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function posts() {
        return $this->hasMany(Post::class, 'user_id', '_id');
    }

    public function likes() {
        return $this->hasMany(PostLike::class, 'user_id', '_id');
    }

    // Users this user is following
    public function following()
    {
        return $this->hasMany(Follower::class, 'follower_id', '_id');
    }

    // Users who follow this user
    public function followers()
    {
        return $this->hasMany(Follower::class, 'user_id', '_id');
    }
}

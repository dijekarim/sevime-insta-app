<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function follow(User $user) {
        if (auth()->id() === $user->id) {
            return response()->json(['message' => 'You cannot follow yourself.'], 400);
        }
        
        $user->following()->create([
            'user_id' => auth()->id(),
        ]);
        return response()->json(['message' => 'Followed']);
    }
}

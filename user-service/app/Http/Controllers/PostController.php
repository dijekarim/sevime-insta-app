<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {
    public function store(Request $request) {
        // Get the authenticated user
        $authenticatedUser = Auth::user();
        if (!$authenticatedUser) {
            return response()->json(['error' => 'User not authenticated.'], 401);
        }

        $validated = $request->validate([
            'image' => 'required|image',
            'caption' => 'nullable|string',
        ]);

        $path = $request->file('image')->store('images', 'public');

        $post = Post::create([
            'user_id' => $authenticatedUser->id,
            'image' => 'storage/' . $path,
            'caption' => $validated['caption'] ?? null,
        ]);

        return response()->json($post, 201);
    }

    public function index() {
        // Get the authenticated user
        $authenticatedUser = Auth::user();
        if (!$authenticatedUser) {
            return response()->json(['error' => 'User not authenticated.'], 401);
        }
        return $authenticatedUser->posts()->with(['comments.user', 'likes.user'])->get();
    }

    public function like(Post $post) {
        $post->likes()->create([
            'user_id' => auth()->id(),
        ]);
        return response()->json(['message' => 'Liked']);
    }

    public function comment(Request $request, Post $post) {
        $validated = $request->validate(['content' => 'required|string']);

        $comment = $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        return response()->json($comment, 201);
    }
}

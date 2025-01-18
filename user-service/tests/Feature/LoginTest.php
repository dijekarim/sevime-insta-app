<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use function Pest\Laravel\post;

beforeEach(function () {
    // Create a user
    User::create([
        'name' => 'user',
        'email' => 'user@example.com',
        'password' => Hash::make('password'),
    ]); 
});

it('logs in successfully with valid credentials', function () {
    // Act: Attempt to log in
    $response = post('/api/login', [
        'email' => 'user@example.com',
        'password' => 'password',
    ]);

    // Assert: Check if the response is successful and contains a token
    $response->assertStatus(200)
             ->assertJsonStructure(['access_token']);
});

it('fails to log in with invalid credentials', function () {
    // Act: Attempt to log in with wrong credentials
    $response = post('/api/login', [
        'email' => 'user@example.net',
        'password' => 'wrongpassword',
    ]);

    // Assert: Check if the response indicates failure
    $response->assertStatus(401)
             ->assertJson(['error' => 'Unauthorized']);
});

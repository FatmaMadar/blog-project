<?php

use App\Models\User;

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('allows an authenticated user to create a blog', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/blogs', [
        'title' => 'My first blog',
        'content' => 'This is a valid blog post content.',
    ]);

    $response->assertRedirect('/blogs');
    $this->assertDatabaseHas('blogs', [
        'title' => 'My first blog',
        'user_id' => $user->id,
    ]);
});

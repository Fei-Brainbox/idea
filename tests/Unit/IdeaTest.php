<?php

use App\Models\Idea;
use App\Models\User;

test('example', function () {
    expect(true)->toBeTrue();
});

test('idea has a user', function () {
    $idea = Idea::factory()->create();
    expect($idea->user)->toBeInstanceOf(User::class);
});

test('idea has steps', function () {
    $idea = Idea::factory()->create();

    expect($idea->steps)->toBeEmpty();

    $idea->steps()->create([
        'description' => 'This is a test',
    ]);

    expect($idea->refresh()->steps)->toHaveCount(1);
});

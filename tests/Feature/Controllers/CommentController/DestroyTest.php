<?php

use App\Models\Comment;

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;

it('requires authentication', function () {
    // check auth user , we a comment to delete it , and not nessesry to add parent route post.comm...
    delete(route('comments.destroy', Comment::factory()->create()))
        ->assertRedirect(route('login'));
});

it('can delete a comment', function () {
    $comment = Comment::factory()->create();
//login
    actingAs($comment->user)->delete(route('comments.destroy', $comment));

    $this->assertModelMissing($comment);
});

it('redirects to the post show page', function () {
    $comment = Comment::factory()->create();
//comment must be crreated by this user
    actingAs($comment->user)
        ->delete(route('comments.destroy', $comment))
        ->assertRedirect(route('posts.show', $comment->post_id));
});

it('prevents deleting a comment you didnt create', function () {
    $comment = Comment::factory()->create();
//act as new user
    actingAs(User::factory()->create())
        ->delete(route('comments.destroy', $comment))
        ->assertForbidden();
});
<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post) // nessted resource controller with post 
    {
        $data = $request->validate(['body' => ['required', 'string', 'max:2500']]);

        //  $comment = Comment::make($data);
        Comment::create([
            ...$data,
            'post_id' => $post->id,
            'user_id' => $request->user()->id,
        ]);

        //redirect
        return to_route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Comment $comment)
    {
        //if user not oner of this comment
        if ($request->user()->id !== $comment->user_id) {
            abort(403);
        }
        // use policy
        //    $this->authorize('delete', $comment); // this was in laravel 10
        //laravel 11 v23 Jeffrey way
       // Gate::authorize('delete', $comment); //i think is no need to do that , its now in resource


        $comment->delete();
        // Redirect to post_id and not the whole post form to avoid doing the query again
      //  return to_route('posts.show', $comment->post_id);
        //to return to show and with the same page in pagination , but we need to update delete form by emit
        return to_route('posts.show', ['post' => $comment->post_id, 'page' => $request->query('page')]);

    }
}

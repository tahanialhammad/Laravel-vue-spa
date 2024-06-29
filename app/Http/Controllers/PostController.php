<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Posts/Index', [
            // 'posts' => Post::all(),
            //  'posts' => PostResource::collection(Post::all()),
            //  'posts' => PostResource::collection(Post::paginate()), //ega loaden is faster is by collection(Post::with('user')->paginate()) , it load all needed user in one query, but not all data we need fron user table , so we need to fix PostResource to load data only when we needed in vue 
            //  'posts' => PostResource::collection(Post::latest()->latest('id')->paginate()), //this wil be ordered by creat_at then id, if tow post created at the same time
            //for user name 
            'posts' => PostResource::collection(Post::with('user')->latest()->latest('id')->paginate()),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Post::class);
        return inertia('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StorePostRequest $request)

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'min:10', 'max:120'],
            'body' => ['required', 'string', 'min:100', 'max:10000'],
        ]);

        $post = Post::create([
            ...$data,
            'user_id' => $request->user()->id,
        ]);

        return to_route('posts.show', $post);
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('user');

        return inertia('Posts/Show', [
            // 'post' => PostResource::make($post), // fn () => It is faster because it is only executed when we need to pass to the front end.
            'post' => fn () => PostResource::make($post),
            'comments' => fn () => CommentResource::collection($post->comments()->with('user')->latest()->latest('id')->paginate(10)),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}

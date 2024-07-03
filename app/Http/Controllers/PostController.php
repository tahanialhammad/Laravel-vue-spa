<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\TopicResource;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return inertia('Posts/Index', [
    //         // 'posts' => Post::all(),
    //         //  'posts' => PostResource::collection(Post::all()),
    //         //  'posts' => PostResource::collection(Post::paginate()), //ega loaden is faster is by collection(Post::with('user')->paginate()) , it load all needed user in one query, but not all data we need fron user table , so we need to fix PostResource to load data only when we needed in vue 
    //         //  'posts' => PostResource::collection(Post::latest()->latest('id')->paginate()), //this wil be ordered by creat_at then id, if tow post created at the same time
    //         //for user name 
    //         //'posts' => PostResource::collection(Post::with('user')->latest()->latest('id')->paginate()),
    //         'posts' => PostResource::collection(Post::with(['user', 'topic'])->latest()->latest('id')->paginate()),
    //     ]);
    // }
    public function index(Topic $topic = null)
    {
        $posts = Post::with(['user', 'topic'])
            ->when($topic, fn (Builder $query) => $query->whereBelongsTo($topic))
            ->latest()
            ->latest('id')
            ->paginate();

        return inertia('Posts/Index', [
            'posts' => PostResource::collection($posts),
            'topics' => fn () => TopicResource::collection(Topic::all()),
            'selectedTopic' => fn () => $topic ? TopicResource::make($topic) : null,
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

      //  return to_route('posts.show', $post);
        //use slug 
        return redirect($post->showRoute());
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request , Post $post)
    {
        //use request to update slug url 
        if (! Str::contains($post->showRoute(), $request->path())) {
            return redirect($post->showRoute($request->query()), status: 301); //give page of any other pram
        }

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

<?php

use App\Http\Resources\PostResource;
use App\Models\Post;
use Inertia\Testing\AssertableInertia;

use function Pest\Laravel\get;

it('should return the correct component', function () {
    get(route('posts.index'))
        // ->assertInertia(fn (AssertableInertia $inertia) => $inertia
        //     ->component('Posts/Index', true)
        // );
        ->assertComponent('Posts/Index');
});

// it('passes posts to the view', function () {
//     get(route('posts.index'))
//         ->assertInertia(fn (AssertableInertia $inertia) => $inertia
//             ->has('posts')
//         );
// });

  //test resources and pagination v9
it('passes posts to the view', function () {
    $posts = Post::factory(3)->create();

    get(route('posts.index'))
//this macro function is extracted in testingprovider :  php artisan make:provider TestingServiceProvider
        ->assertHasPaginatedResource('posts', PostResource::collection($posts->reverse()));
});
<?php

use App\Http\Resources\PostResource;
use App\Http\Resources\TopicResource;
use App\Models\Post;
use App\Models\Topic;
use Inertia\Testing\AssertableInertia;

use function Pest\Laravel\get;

it('should return the correct component', function () {
  get(route('services.index'))
    ->assertComponent('Services/Index');
});

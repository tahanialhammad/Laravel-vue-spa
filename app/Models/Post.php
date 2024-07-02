<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;


class Post extends Model
{
    use HasFactory;

    //overwrite booted method , call this when post createted, updated
    protected static function booted()
    {
        static::saving(fn (self $post) => $post->fill(['html' => str($post->body)->markdown()]));
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    //to make post title in upercase automaticly
    public function title(): Attribute
    {
        return Attribute::set(fn ($value) => Str::title($value));
    }

//body and html, but its not best practice becouse we wil call this with every single edit on the post, so we go to use listener to event on the model
    // public function body(): Attribute
    // {
    //     return Attribute::set(fn ($value) => [
    //         'body'=> $value,
    //         'html' => str($value)->markdown()
    //         ]
    //     );
    // }
    //to make slug url ,in array so we can add more pram ex page ....
    // add it to post resource
    public function showRoute(array $parameters = [])
    {
        // this == id , slug method = title, extra pram ,
        return route('posts.show', [$this, Str::slug($this->title), ...$parameters]);
    }
}

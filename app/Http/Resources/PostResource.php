<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
        //    'user' => UserResource::make($this->user), //lazy load 
            'user' => $this->whenLoaded('user', fn () => UserResource::make($this->user)), //load relation user when we needed
            'title' => $this->title,
            'body' => $this->body,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            // for slug url 
            'routes' => [
                'show' => $this->showRoute(),
            ],
        ];
    }
}
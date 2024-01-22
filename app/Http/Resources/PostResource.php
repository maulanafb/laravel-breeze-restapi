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
            'post_id' => $this->id,
            'post_title' => $this->title,
            'post_slug' => $this->slug,
            'post_content' => $this->content,
            'post_created_at' => $this->created_at,
            'post_updated_at' => $this->updated_at,
            'author' => $this->whenLoaded('author', function () {
                return new UserResource($this->author);
            })
        ];
    }
}

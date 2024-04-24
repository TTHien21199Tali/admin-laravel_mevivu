<?php

namespace App\Api\V1\Http\Resources\Post1;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowPost1Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'image' => asset($this->image),
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'posted_at' => $this->posted_at,
        ];
    }
}

<?php

namespace App\Api\V1\Http\Resources\Post1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AllPost1Resource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function($post1){
            
            return [
                'id' => $post1->id,
                'title' => $post1->title,
                'slug' => $post1->slug,
                'image' => asset($post1->image),
                'excerpt' => $post1->excerpt,
                'posted_at' => $post1->posted_at,
            ];
            
        });
    }

    
}

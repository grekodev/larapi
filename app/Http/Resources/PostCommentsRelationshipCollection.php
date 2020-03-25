<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCommentsRelationshipCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $posts = $this->additional['post'];
        return [
            'data' => CommentIdentifierResource::collection($this->collection),
            'links'=> [
                'self' => route('posts.relationships.commnets', ['post' => $posts]),
                'related' => route('posts.commnets', ['post' => $posts])
            ]
        ];
    }
}

<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\UserResource;
use App\Model\Post;

class PostRelationshipController extends Controller
{
    public function author(Post $post)
    {
        return new UserResource($post->author);
    }

    public function commnets(Post $post)
    {
       return CommentsResource::collection($post->comments);
    }
}

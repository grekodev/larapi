<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'author_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function isAuthorLoaded()
    {
        return $this->relationLoaded('author');
    }

    public function isCommentsLoaded()
    {
        return $this->relationLoaded('comments');
    }
}

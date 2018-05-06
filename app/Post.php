<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'subtitle', 'content', 'author_id', 'media_id'];

    public function categories()
    {
        return $this->belongsToMany(PostCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}

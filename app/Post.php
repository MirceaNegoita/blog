<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'subtitle', 'slug' ,'content', 'author_id', 'media_id', 'status_id'];

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

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function seo()
    {
        return $this->belongsTo(Seo::class);
    }
}

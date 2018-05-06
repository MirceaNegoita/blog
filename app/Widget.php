<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    protected $table = "widgets";

    protected $fillable = ['content', 'author_id', 'media_id'];

    public function author()
    {
    	return $this->belongsTo(User::class);
    }

    public function media()
    {
    	return $this->belongsTo(Media::class);
    }
}

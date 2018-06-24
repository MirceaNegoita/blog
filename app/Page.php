<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = "pages";

    protected $fillable = ['title', 'subtitle', 'content', 'slug' ,'media_id'];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}

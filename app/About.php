<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['title', 'subtitle', 'content', 'media_id'];

    protected $table = "abouts";

    public function media()
    {
    	return $this->belongsTo(Media::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageTemplate extends Model
{
    protected $table = ['page_templates'];

    protected $fillable = ['title', 'subtitle', 'content', 'footer', 'media_id'];
    
}

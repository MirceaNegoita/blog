<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactWidget extends Model
{
    protected $table = "contact_widgets";

    protected $fillable = ['title', 'content'];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}

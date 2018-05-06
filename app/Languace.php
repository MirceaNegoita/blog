<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Languace extends Model
{
    protected $table = "languages";

    public $fillable = ['is_visible','is_default'];

    public function scopeVisible()
    {
        return $this->where('is_visible',1)->get();
    }

    public function scopeDefaultLanguage()
    {
        return $this->where('is_default',1);
    }

    public function scopeCurrent()
    {
        $current = App::getLocale();
        $default = $this->defaultLanguage()->first();

        /*if($default)
            $language = $default->iso_639_1;
        else
            $language = $current;

        return $this->where('iso_639_1',$language)->first();*/


        if($default)
        $language = $default->iso_639_1;

        if( !is_null($current) )
            $language = $current;

        return $this->where('iso_639_1',$language)->first();

    }
}

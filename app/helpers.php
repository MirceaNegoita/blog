<?php 

function getMicrotime()
{
    return str_replace(".","",microtime(true));
}

function getFileNameWithoutExtension($originalName)
{
    return substr($originalName, 0, strpos($originalName, '.'));
}

function truncate($str, $len) {
    $tail = max(0, $len-10);
    $trunk = substr($str, 0, $tail);
    $trunk .= strrev(preg_replace('~^..+?[\s,:]\b|^...~', '...', strrev(substr($str, $tail, $len-$tail))));
    return strip_tags($trunk);

}

function injectTranslationJSON(){

    $defaultLang = \App\Models\Language::where('is_default',1)->first();

    if($defaultLang)
        $lng = $defaultLang->iso_639_1;
    else
        $lng = "ro";

    return json_encode([$lng => '']);
}

function insertDB($current, $data)
{
    if(!$current)
        $current = injectTranslationJSON();

    $current = json_decode($current);

    //recheck for previous values(without json translator added)
    if($current == NULL) {
        $current = injectTranslationJSON();
        $current = json_decode($current);
    }

    $current->{Session::get('lng')} = $data;

    $data = json_encode($current);

    return $data;
}

function transDB($key, $lang=false)
{
    $lang = Session::get('lng');
    $decodeJSON = json_decode($key);
    if(!isset($decodeJSON->{$lang}))
        return '';
        //return '['.Session::get('lng').'] No translate ';

    if(!isset($decodeJSON->{$lang}))
        return $decodeJSON->en;

    //return (strlen($decodeJSON->{$lang}) < 1 ? '['.Session::get('lng').'] No translate ' : $decodeJSON->{$lang});
    return (strlen($decodeJSON->{$lang}) < 1 ? '' : $decodeJSON->{$lang});
}
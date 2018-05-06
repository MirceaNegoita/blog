<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguaceController extends Controller
{
    public function index()
    {
        $languages = Language::Where('is_visible',0)->get();
        $visibleLanguages = Language::Where('is_visible',1)->get();

        return view('admin.languages.list')->with(compact('languages','visibleLanguages'));
    }

    public function makeVisible(Request $request){

        try {
            $language = Language::findOrFail($request->input('language'));

            $language->is_visible = 1;
            $language->update();

            $localPath = getcwd();
            $trimPath = rtrim($localPath, 'public');
            $path = $trimPath . 'resources/lang/' . $language->iso_639_1;

            $en_dir = $trimPath . 'resources/lang/en';

            if(!is_dir($path))
            {
                mkdir($path, 0777);

                $en_files = array_diff(scandir($en_dir), array('..', '.'));

                //copy each english file to the new language folder
                foreach($en_files as $en_file){
                    copy($trimPath.'resources/lang/en/'.$en_file, $trimPath.'resources/lang/'.$language->iso_639_1.'/'.$en_file);
                }

                //then copy the .json base language file
                copy($trimPath.'resources/lang/en.json', $trimPath.'resources/lang/'.$language->iso_639_1.'.json');

            }

            return redirect(Route('languages.index'))->with("successes", array(__('Language successfully activated!')));
        }

        catch(ModelNotFoundException $e)
        {
            return redirect(Route('languages.index'))->with('errors', array(__('Invalid Language!')));
        }

    }

    public function notVisible($id){

        try {
            Language::findOrFail($id)->update(["is_visible" => 0,"is_default" => 0]);

            return redirect(Route('languages.index'))->with("successes", array(__('Language successfully deactivated!')));
        }

        catch(ModelNotFoundException $e)
        {
            return redirect(Route('languages.index'))->with('errors', array(__('Invalid Language!')));
        }

    }

    public function doDefault($id){

        try {
            Language::findOrFail($id)->update(["is_default" => 1]);

            Language::Where('is_visible',1)->Where('id','<>',$id)->update(["is_default" => 0]);

            return redirect(Route('languages.index'))->with("successes", array(__('The language was set to default!')));
        }

        catch(ModelNotFoundException $e)
        {
            return redirect(Route('languages.index'))->with('errors', array(__('Invalid Language!')));
        }

    }

    public function getFiles(){

        $visibleLanguages = Language::Where('is_visible',1)->get();

        return view('admin.languages.files',compact('visibleLanguages'));

    }

    public function changeLang(Request $request){

        try {
            $language = Language::findOrFail($request->input('lang_id'));

            session(['lng'=>$language->iso_639_1]);

            App::setLocale($language->iso_639_1);

            return ['success' => true, 'data' => __('Language Changed!')];
        }

        catch(ModelNotFoundException $e)
        {
            return ['error' => false, 'data' => __('Invalid Language!')];
        }

    }

    public function selectLanguageFile(Request $request){

        try {
            $selectedLanguage = Language::findOrFail($request->input('language'));

            $visibleLanguages = Language::Where('is_visible',1)->get();

            return view('admin.languages.files',compact('visibleLanguages','selectedLanguage'));

        }

        catch(ModelNotFoundException $e)
        {
            return redirect()->back()->with('errors',[__('Invalid Language!')]);
        }

    }

    public function addTranslation(Request $request){

        $localPath = getcwd();
        $trimPath = rtrim($localPath, 'public');
        $path = $trimPath . 'resources/lang/' . $request->input('lang') . '.json';

        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);

        $i = 0;

        foreach ($data as $key => $entry) {
            if ($request->input('counter') == $i) {
                $data[$key] = $request->input('lang_val');
            }
            $i++;
        }

        $newJsonString = json_encode($data);
        file_put_contents($path, $newJsonString);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}

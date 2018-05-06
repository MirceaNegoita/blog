<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use App\About;

class AboutController extends AdminController
{
    public function index()
    {
    	$abouts = About::orderBy('created_at', 'desc')->get();

    	return view('admin.about.index', compact('abouts'));
    }

    public function create()
    {
    	return view('admin.about.create');
    }

    public function store(Request $request)
    {
    	$about = new About();

    	$about->title = $request->input('title');
    	$about->subtitle = $request->input('subtitle');
    	$about->content = $request->input('content');

    	if ($request->hasFile('image')) {
    		$media = new Media();
    		$media->saveMedia($request->file('image'), 'about');

    		$about->media_id = $media->id;
    	}

        $about->save();

    	$notification = array(
    		'message' => 'About Page Stored',
    		'alert_type' => 'success'
    	);

        return redirect()->route('about.index')->with($notification);
    }

    public function edit($id)
    {
    	$about = About::find($id);

    	return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
    	$about = About::find($id);

    	$about->title = $request->input('title');
    	$about->subtitle = $request->input('subtitle');
    	$about->content = $request->input('content');

    	if ($request->hasFile('image')) {
    		$media = new Media();
    		$media->saveMedia($request->file('image'), 'about');

    		$about->media_id = $media->id;
    	}

        $about->update();

    	$notification = array(
    		'message' => 'About Page Updated',
    		'alert_type' => 'success'
    	);

    	return redirect()->route('about.index')->with($notification);

    }

    public function delete($id)
    {
    	$about = About::find($id);

    	$about->delete();

    	$notification = array(
    		'message' => 'About Page Deleted',
    		'alert_type' => 'success'
    	);

    	return redirect()->route('about.index')->with($notification);
    }
}

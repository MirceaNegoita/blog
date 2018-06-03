<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Widget;
use App\User;
use App\Media;

class WidgetController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $widgets = Widget::all();

        return view('admin.widget.index', compact('widgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $author = User::where('name', 'Mircea')->first();

        return view('admin.widget.create', compact('author'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $widget = new Widget();

        $widget->content = $request->input('content');
        $widget->author_id = $request->input('author');

        if($request->hasFile('image')){
            $media = new Media();
            $media->saveMedia($request->file('image'), 'widget');

            $widget->media_id = $media->id;
        }

        $widget->save();

        $notification = array(
            'message' => 'Widget Created',
            'alert-type' => 'success'
        );

        return redirect()->route('widget.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $widget = Widget::find($id);
        $authors = User::where('role_id',1)->get();

        return view('admin.widget.edit', compact('widget', 'authors'));
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
        $widget = Widget::find($id);

        $widget->content = $request->input('content');
        $widget->author_id = $request->input('author');

        if($request->hasFile('image')){
            $media = new Media();
            $media->saveMedia($request->file('image'), 'widget');

            $widget->media_id = $media->id;
        }

        $notification = array(
            'message' => 'Widget Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('widget.index')->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $widget = Widget::find($id);
        $widget->delete();

        $notification = array(
            'message' => 'Widget Deleted',
            'alert-type' => 'success'
        );

        return redirect()->route('widget.index')->with($notification);
    }

    public function delete($id)
    {
        $widget = Widget::find($id);
        $widget->delete();

        $notification = array(
            'message' => 'Widget Deleted',
            'alert-type' => 'success'
        );

        return redirect()->route('widget.index')->with($notification);
    }
}

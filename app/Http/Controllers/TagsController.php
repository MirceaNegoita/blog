<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagsController extends AdminController
{
    public function index()
    {
        $tags = Tag::all();

        return view('admin.blog.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.blog.tags.create');
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'name' => 'required'
        ]);

        $tag = new Tag();
        $tag->name = $request->input('name');

        $tag->save();

        $notification = array(
            'message' => 'Tag Saved',
            'alert-type' => 'success'
        );

        return redirect()->route('tag.index')->with($notification);
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('admin.blog.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $tag = Tag::find($id);
        $tag->name = $request->input('name');

        $tag->update();

        $notification = array(
            'message' => 'Tag updated',
            'alert-type' => 'success'
        );

        return redirect()->route('tag.index')->with($notification);
    }

    public function delete($id)
    {
        $tag = Tag::find($id);

        $tag->delete();

        $notification = array(
            'message' => 'Tag Deleted',
            'alert-type' => 'success'
        );

        return redirect()->route('tag.index')->with($notification);
    }
}

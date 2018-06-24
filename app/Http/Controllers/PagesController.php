<?php

namespace App\Http\Controllers;
use App\Page;
use App\Media;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $pages = $pages::all();

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $page = new Page();

        $this->validate($request, [
            'title'   => 'required',
            'content' => 'required',
            'slug'    => 'required'
        ]);

        $page->title = trim($request->input('title'));
        $page->subtitle = trim($request->input('subtitle'));
        $page->content = trim($request->input('content'));
        $page->slug = trim($request->input('slug'));

        if ($request->hasFile('image')) {
            $media = new Media();
            $media->saveMedia($request->file('image'), 'pages');
            $page->media_id = $media->id;
        }

        $page->save();

        return redirect()->route('pages.index');
    }

    public function edit($id)
    {
        $page = Page::find($id);

        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $page = Page::find($id);

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $page->title = trim($request->input('title'));
        $page->subtitle = trim($request->input('subtitle'));
        $page->content = trim($request->input('content'));
        $page->slug = trim($request->input('slug'));

        if ($request->hasFile('image')) {
            $media = new Media();
            $media->saveMedia($request->file('images'), 'pages');

            $page->media_id = $media->id;
        }

        $page->update();

        return redirect()->route('pages.index');
    }

    public function delete($id)
    {
        $page = Page::find($id);
        $page->delete();

        return redirect()->route('pages.index');
    }
}

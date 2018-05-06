<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PostCategory;

class PostCategoriesController extends AdminController
{
    public function index()
    {
        $categories = PostCategory::all();

        return view('admin.blog.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = new PostCategory();
        $category->name = $request->input('name');

        $category->save();

        $notification = array(
            'message' => 'Category Created',
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')->with($notification);
    }

    public function edit($id)
    {
        $category = PostCategory::find($id);

        return view('admin.blog.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = PostCategory::find($id);

        $category->name = $request->input('name');

        $category->update();

        $notification = array(
            'message' => 'Category Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')->with($notification);
    }

    public function delete($id)
    {
        $category = PostCategory::find($id);

        $category->delete();

        $notification = array(
            'message' => 'Category Deleted',
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')->with($notification);
    }
}

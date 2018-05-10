<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use App\Tag;
use App\Status;
use App\Media;
use App\PostCategory;

class PostsController extends AdminController
{
    public function index()
    {
        $posts = Post::all();
        

        return view('admin.blog.posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = PostCategory::all();
        $authors = User::where('role_id', 1)->get();
        $statuses = Status::all();

        return view('admin.blog.posts.create', compact('tags', 'categories', 'authors', 'statuses'));
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->subtitle = $request->input('subtitle');
        $post->content = $request->input('content');
        $post->author_id = $request->input('author');

        if ($request->hasFile('image')) {
            $media = new Media();
            $media->saveMedia($request->file('image'), 'posts');

            $post->media_id = $media->id;
        }

        $post->save();

        if ($request->has('categories')) {
            $post->categories()->attach($request->input('categories'));
        }

        if ($request->has('tags')) {
            $post->tags()->attach($request->input('tags'));
        }

        $notification = array(
            'message' => 'Post Saved',
            'alert-type' => 'success'
        );

        return redirect()->route('post.index')->with($notification);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();
        $categories = PostCategory::all();
        $authors = User::where('role_id',1)->get();
        $statuses = Status::all();

        return view('admin.blog.posts.edit', compact('post', 'tags', 'categories', 'authors', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->subtitle = $request->input('subtitle');
        $post->content = $request->input('content');
        $post->author_id = $request->input('author');

        if ($request->hasFile('image')) {
            $media = new Media();
            $media->saveMedia($request->file('image'), 'posts');

            $post->media_id = $media->id;
        }

        $post->update();

        $post->categories()->sync($request->input('categories'));
        $post->tags()->sync($request->input('tags'));

        $notification = array(
            'message' => 'Post Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('post.index')->with($notification);
    }

    public function delete($id)
    {
        $post = Post::find($id);

        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();

        $notification = array(
            'message' => 'Post Deleted',
            'alert-type' => 'success'
        );

        return redirect()->route('post.index')->with($notification);
    }
}

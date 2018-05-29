<?php

namespace App\Logic\Render;
use App\Post;
use App\About;
use File;

class PageRender
{

    public function getHomePage()
    {
        $posts = Post::orderBy('created_at', 'DESC')->has('media')->where('status_id', 2)->paginate(5);

        if (!is_null(\request('tag'))){
            $tagId = \request('tag');
            $posts = Post::whereHas('tags', function ($q) use ($tagId){
                return $q->where('id', $tagId);
            });
        }

        if (!is_null(\request('category'))) {
            $categoryId = \request('category');
            $posts = Post::whereHas('categories', function($q) use ($categoryId){
                return $q->where('id', $categoryId);
            });
        }
    
        return view('client.posts.index', compact('posts'))->render();
    }

    public function getAboutPage()
    {
        $about = About::first();

        return view('client.about.index', compact('about'))->render();
    }

    public function getContactPage()
    {
        return view('client.contact.index')->render();
    }

    public function getPost($id)
    {
        $post = Post::find($id);

        return view('client.post.index', compact('post'))->render();
    }
    
}

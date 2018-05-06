<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\About;
use App\AppMailer;
use App\Widget;
use App\ContactMessage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $widget = Widget::first();
         
        view()->share('widget', $widget);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function posts()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(5);

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
    
        return view('client.posts.index', compact('posts'));
    }

    public function post($id)
    {
        $post = Post::find($id);

        return view('client.post.index', compact('post'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $posts = Post::where('title', $search)
                    ->orWhere('title' , 'LIKE', '%' .$search. '%')
                    ->orWhere('content', 'LIKE', '%' .$search. '%')
                    ->orWhereHas('tags', function($q) use ($search){
                        return $q->where('title', 'like', '%'.$search.'%');
                    })
                    ->orWhereHas('categories', function($q) use ($search){
                        return $q->where('title', 'like', '%'.$search.'%');
                    })
                    ->paginate(5);

        return view('client.posts.index', compact('posts'));
                
    }

    public function about()
    {
        $about = About::first();

        return view('client.about.index', compact('about'));
    }

    public function contact()
    {
        return view('client.contact.index');
    }

    public function postContact(Request $request, AppMailer $mailer)
    {
        $contact = new ContactMessage();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');

        $contact->save();

        $mailer->sendContact($contact);

        return redirect()->route('home')->with('success', 'Message Sent');
    }




}

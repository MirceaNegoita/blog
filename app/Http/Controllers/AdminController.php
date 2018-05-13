<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Widget;
use App\ContactMessage;
use App\User;
use App\Media;

class AdminController extends Controller
{
    public function __construct()
    {
        $widget = Widget::first();
        $recent_messages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();

        view()->share('widget', $widget);
        view()->share('recent_messages', $recent_messages);
    }

    public function index()
    {
        return view('admin.index');
    }

    public function getMessages()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();

        return view('admin.messages.index', compact('messages'));
    }

    public function showMessage($id)
    {
        $message = ContactMessage::find($id);

        return view('admin.messages.show', compact('message'));
    }

    public function getProfile($id)
    {
        $user = User::find($id);
        
        return view('admin.profile.edit', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->description = $request->input('description');

        if ($request->hasFile('image'))
        {
            $media = new Media();
            $media->saveMedia($request->file('image'), 'users');

            $user->media_id = $media->id;
        }

        $user->update();

        return redirect()->back()->with("succesess", array("Profile updated"));

    }
    
}

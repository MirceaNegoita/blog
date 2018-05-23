<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactWidget;

class ContactWidgetController extends Controller
{
    public function create()
    {
        return view('admin.widget.contact.create');
    }

    public function store(Request $request)
    {
        $contact_widget = new ContactWidget();

        $contact_widget->title = $request->input('title');
        $contact_widget->content = $request->input('content');

        $contact_widget->save();

        return redirect()->route('contact.widget.edit', $contact_widget->id);
    }

    public function edit($id)
    {
        $contact_widget = ContactWidget::find($id);

        return view('admin.widget.contact.edit', compact('contact_widget'));
    }

    public function update(Request $request, $id)
    {
        $contact_widget = ContactWidget::find($id);

        $contact_widget->title = $request->input('title');
        $contact_widget->content = $request->input('content');

        $contact_widget->update();

        return redirect()->route('contact.widget.edit', $contact_widget->id);
    }

    public function delete($id)
    {
        $contact_widget = ContactWidget::find($id);
        $contact_widget->delete();

        return redirect()->route('admin.home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactCreateRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Channel;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contact.create', compact('categories'));
    }

    public function confirm(ContactCreateRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail', 'channel_id']);

        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('images', 'public');
            $contact['img_path'] = $path;
        }

        $category = Category::find($request->category_id);
        $channels = Channel::whereIn('id', $request->channel_id ?? [])->get();

        return view('contact.confirm', compact('contact', 'category', 'channels'));
    }

    public function store(Request $request)
    {
        $tel = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');

        $data = $request->all();
        $data['tel'] = $tel;

        $contact = Contact::create($data);

        if ($request->has('channel_id')) {
        $contact->channels()->sync($request->channel_id);
        }

        return view('contact.thanks');
    }

    public function back(Request $request)
    {
        return redirect('/')->withInput();
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }
}

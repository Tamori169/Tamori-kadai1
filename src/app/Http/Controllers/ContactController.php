<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactCreateRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contact.create', compact('categories'));
    }

    public function confirm(Request $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail']);
        $category = Category::find($request->category_id);

        return view('contact.confirm', compact('contact', 'category'));
    }

    public function store(Request $request)
    {
        $tel = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');

        $data = $request->all();
        $data['tel'] = $tel;

        Contact::create($data);
        return view('contact.thanks');
    }

    public function back(Request $request)
    {
        return redirect('/')->withInput();
    }
}

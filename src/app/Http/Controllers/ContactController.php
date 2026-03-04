<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactCreateRequest;
use App\Models\Contact;
use App\Models\Category;

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
        Contact::create($request->all());
        return view('contact.thanks');
    }

    public function back(Request $request)
    {
        return redirect('/')->withInput();
    }
}

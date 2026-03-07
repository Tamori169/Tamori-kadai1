<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')
                    ->search($request)
                    ->paginate(7);

        $categories = Category::all();

        return view('admin', compact('contacts','categories'));
    }

    public function reset()
    {
        return redirect('admin');
    }

    public function export(Request $request)
    {
        $contacts = Contact::with('category')
            ->search($request)
            ->get();

        $csv = "名前,性別,メールアドレス,お問い合わせの種類\n";

        foreach ($contacts as $contact) {

        $csv .=
        $contact->last_name.' '.$contact->first_name.','
        .Contact::genderLabel($contact->gender).','
        .$contact->email.','
        .$contact->category->content."\n";

        }

        return response($csv)
            ->header('Content-Type','text/csv')
            ->header(
                'Content-Disposition',
                'attachment; filename=contacts.csv'
            );
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request;
        $category = Category::find($contact->category_id);

        return view('confirm', compact('contact', 'category'));
    }

    public function store(ContactRequest $request)
    {
        if ($request->input('back') == 'back') {
            return redirect('/')->withInput();
        }

        $contact = $request->organize();
        Contact::create($contact);

        return redirect('/thanks');
    }
    
    public function thanks()
    {
        return view('thanks');
    }

    public function admin()
    {
        $contacts = Contact::with('category')->get()->toQuery()->Paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->GenderSearch($request->gender)->DateSearch($request->date)->get()->toQuery()->Paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();

        return redirect('/admin');
    }
}

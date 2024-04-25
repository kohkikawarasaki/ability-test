<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
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

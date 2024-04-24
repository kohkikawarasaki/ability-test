<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function register(AuthRequest $request)
    {
        return redirect('/login');
    }

    public function login(AuthRequest $request)
    {
        return redirect('/');
    }
}

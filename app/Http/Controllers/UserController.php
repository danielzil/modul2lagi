<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.home', compact('user'));
    }
}

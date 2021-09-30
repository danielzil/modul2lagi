<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $role = Auth::user()->hasrole;
        if($role == "admin"){
            return redirect()->to('admin');
        } else if($role == "user"){
            return redirect()->to('user');
        } else {
            return redirect()->to('logout');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}

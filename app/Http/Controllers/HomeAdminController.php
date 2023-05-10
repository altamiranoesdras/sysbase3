<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::with(['shortcuts','options'])->find(auth()->user()->id);


        return view('home',compact('user'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function profile()
    {
        return view('admin.users.profile');
    }

    public function contact()
    {
        return view('admin.contact');
    }

    public function calendar()
    {
        return view('calendar');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassportClientsController extends Controller
{

    /**
     * PassportClientsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('developer.admin_oauth_client');
    }
}

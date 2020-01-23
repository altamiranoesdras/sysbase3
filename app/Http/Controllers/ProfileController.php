<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profile = Auth::user();
        return view('admin.users.profile',compact('profile'));
    }

    public function update(User $user,Request $request)
    {

//        dd($user->toArray(),$request->toArray());
        $user->fill($request->all());
        $user->save();

        flash(__('Updated profile!'))->success()->important();

        return redirect(route('profile'));
    }
}

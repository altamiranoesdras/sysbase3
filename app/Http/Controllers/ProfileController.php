<?php

namespace App\Http\Controllers;

use App\Models\User;
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


        $user->fill($request->all());
        $user->save();

        flash(__('Updated profile!'))->success()->important();

        return redirect(route('profile'));
    }

    public function editAvatar(User $user,Request $request)
    {

        try {
            $user->clearMediaCollection('avatars');
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');


        } catch (\Exception $exception) {

            return response()->json($exception->getMessage(),500);
        }

        flash("Imagen Actualizada")->success();
        return response()->json($user->toArray());

    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class HomeController extends AppBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('web.landing');
    }


    public function panel()
    {
        return view('web.panel');
    }

    public function perfil()
    {
        return view('web.perfil');
    }

    public function perfilUpdate(User $user,Request $request)
    {

        $user->fill($request->all());
        $user->save();

        flash('Perfil actualizado con exito')->success();

        return redirect(route('perfil'));
    }

    public function planes()
    {
        return view('web.planes');
    }

    public function gracias()
    {

        return view('web.gracias');
    }

    public function contact()
    {
        return view('web.contacto');
    }

    public function contactStore(Request $request)
    {

        try {
            $correo = appIsDebug() ? "altamiranoesdras@gmail.com" : 'info@dametuinsta.com';
            Mail::to($correo)->send(new ContactMail());
        }catch (\Exception $exception){

            return $this->sendError('hubo un error intente de nuevo!');

        }

        return $this->sendResponse([],'!Mensaje enviado correctamente!');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PruebaApiController extends Controller
{

    /**
     * PruebaApiController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $routeCollection = Route::getRoutes();

        $rutas = [];

        foreach ($routeCollection as $ruta) {

            if ($ruta->getPrefix()=="api"){
                $rutas[$ruta->uri] = $ruta->uri;
            }
        }

        return view('developer.pruebas_apis',compact('rutas'));
    }
}

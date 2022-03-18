<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class BusinessProfileController extends Controller
{


    //
    /**
     * BusinessProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        return view('admin.business_profile.index');
    }

    public function store(Request $request)
    {

        Configuration::updateOrCreate([
            'key' => 'name',
        ],[
            'key' => 'name',
            'value' => $request->name,
            'descripcion' => $request->name,
        ]);

        if($request->telefono_negocio){

            Configuration::updateOrCreate([
                'key' => 'telefono_negocio',
            ],[
                'key' => 'telefono_negocio',
                'value' => $request->telefono_negocio,
                'descripcion' => $request->telefono_negocio,
            ]);
        }

        if ($request->direccion_negocio){

            Configuration::updateOrCreate([
                'key' => 'direccion_negocio',
            ],[
                'key' => 'direccion_negocio',
                'value' => $request->direccion_negocio,
                'descripcion' => $request->direccion_negocio,
            ]);
        }

        if ($request->correo_negocio){

            Configuration::updateOrCreate([
                'key' => 'correo_negocio',
            ],[
                'key' => 'correo_negocio',
                'value' => $request->correo_negocio,
                'descripcion' => $request->correo_negocio,
            ]);
        }

        if ($request->hasFile('logo')){
            /**
             * @var Configuration $config
             */
            $config = Configuration::find(Configuration::LOGO);
            $config->clearMediaCollection('logo');
            $config->addMediaFromRequest('logo')->toMediaCollection('logo');


        }

        if ($request->hasFile('icono')){
            /**
             * @var Configuration $config
             */
            $config = Configuration::find(Configuration::ICONO);
            $config->clearMediaCollection('icono');
            $config->addMediaFromRequest('icono')
                ->toMediaCollection('icono');


        }

        generarManifest();


        flash('Listo guardado!')->success();

        return redirect(route('profile.business'));
    }


}

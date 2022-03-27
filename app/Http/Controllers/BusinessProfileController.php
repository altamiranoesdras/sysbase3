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

        $meta_keywords = [];

        if (config('app.meta_keywords')){

            foreach (explode(",",config('app.meta_keywords')) as $index => $value) {
                $meta_keywords[$value] = $value ?? '';
            }
        }



        return view('admin.business_profile.index', compact('meta_keywords'));
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

        if($request->whatsapp_negocio){

            Configuration::updateOrCreate([
                'key' => 'whatsapp_negocio',
            ],[
                'key' => 'whatsapp_negocio',
                'value' => $request->whatsapp_negocio,
                'descripcion' => $request->whatsapp_negocio,
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

        if ($request->horario_negocio){

            Configuration::updateOrCreate([
                'key' => 'horario_negocio',
            ],[
                'key' => 'horario_negocio',
                'value' => $request->horario_negocio,
                'descripcion' => $request->horario_negocio,
            ]);
        }

        if ($request->meta_descripcion){

            Configuration::updateOrCreate([
                'key' => 'meta_descripcion',
            ],[
                'key' => 'meta_descripcion',
                'value' => $request->meta_descripcion,
                'descripcion' => $request->meta_descripcion,
            ]);
        }

        if ($request->meta_titulo){

            Configuration::updateOrCreate([
                'key' => 'meta_titulo',
            ],[
                'key' => 'meta_titulo',
                'value' => $request->meta_titulo,
                'descripcion' => $request->meta_titulo,
            ]);
        }

        if ($request->meta_keywords){

            Configuration::updateOrCreate([
                'key' => 'meta_keywords',
            ],[
                'key' => 'meta_keywords',
                'value' => implode(',', $request->meta_keywords),
                'descripcion' => '',
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


        if ($request->hasFile('fondo_login')){
            /**
             * @var Configuration $config
             */
            $config = Configuration::find(Configuration::FONDO_LOGIN);
            $config->clearMediaCollection('fondo_login');
            $config->addMediaFromRequest('fondo_login')->toMediaCollection('fondo_login');
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

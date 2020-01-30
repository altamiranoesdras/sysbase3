<?php

namespace App\Http\Controllers;

use App\DataTables\OptionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Models\Option;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class OptionController extends AppBaseController
{
    private $iconos=[
        'far fa-circle',
        'fa-th',
        'fa-shopping-cart',
        'fa-folder',
        'fa-plus-square',
        'fa-info-circle',
        'fa-laptop',
        'fa-user',
        'fa-user-md',
        'fa-user-plus',
        'fa-user-secret',
        'fa-user-times',
        'fa-users',
        'fa-adjust',
        'fa-adn',
        'fa-align-center',
        'fa-align-justify',
        'fa-align-left',
        'fa-align-right',
        'fa-angle-left',
        'fa-angle-right',
        'fa-ambulance',
        'fa-anchor',
        'fa-android',
        'fa-angellist',
        'fa-angle-down',
        'fa-angle-double-down',
        'fa-angle-double-left',
        'fa-angle-double-right',
        'fa-angle-double-up',
        'fa-angle-up',
        'fa-calculator',
        'fa-apple',
        'fa-archive',
        'fa-area-chart',
        'fa-asterisk',
        'fa-at',
        'fa-car',
        'fa-mobile',
        'fa-mobile',
        'fa-money',
        'fa-ban',
        'fa-university',
        'fa-bar-chart',
        'fa-bar-chart',
        'fa-barcode',
        'fa-bars',

    ];

    /**
     * OptionController constructor.
     * @param array $iconos
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the Option.
     *
     * @param OptionDataTable $optionDataTable
     * @return Response
     */
    public function index()
    {
        $iconos= $this->iconos;
        return view('admin.options.index',compact('iconos'));
    }

    /**
     * Show the form for creating a new Option.
     *
     * @return Response
     */
    public function create(Option $option)
    {
        $parent = $option ?? null;

        $iconos= $this->iconos;

        return view('admin.options.create',compact('iconos','parent'));
    }

    /**
     * Store a newly created Option in storage.
     *
     * @param CreateOptionRequest $request
     *
     * @return Response
     */
    public function store(CreateOptionRequest $request)
    {
        $input = $request->all();

        /** @var Option $option */
        $option = Option::create($input);

        Flash::success('Option saved successfully.');

        return redirect(route('options.index'));
    }

    /**
     * Display the specified Option.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Option $option */
        $option = Option::find($id);

        if (empty($option)) {
            Flash::error('Option not found');

            return redirect(route('options.index'));
        }

        return view('admin.options.show')->with('option', $option);
    }

    /**
     * Show the form for editing the specified Option.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Option $option */
        $option = Option::find($id);

        if (empty($option)) {
            Flash::error('Option not found');

            return redirect(route('options.index'));
        }

        $iconos = $this->iconos;
        $parent = $option->parent ?? null;

        return view('admin.options.edit',compact('option','iconos','parent'));
    }

    /**
     * Update the specified Option in storage.
     *
     * @param  int              $id
     * @param UpdateOptionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOptionRequest $request)
    {
        /** @var Option $option */
        $option = Option::find($id);

        if (empty($option)) {
            Flash::error('Option not found');

            return redirect(route('options.index'));
        }

        $option->fill($request->all());
        $option->save();

        Flash::success('Option updated successfully.');

        return redirect(route('options.index'));
    }

    /**
     * Remove the specified Option from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Option $option */
        $option = Option::find($id);

        if (empty($option)) {
            Flash::error('Option not found');

            return redirect(route('options.index'));
        }

        $option->delete();

        Flash::success('Option deleted successfully.');

        return redirect(route('options.index'));
    }

    public function updateOrden(Request $request){

        $opciones= $request->opciones ? $request->opciones : [];

        $colecion=collect();

        if(count($opciones)>0){


            foreach ($opciones as $orden => $id){
                $opcion = Option::findOrFail($id);
                $opcion->orden= $orden;
                $opcion->save();

                $colecion->push($opcion);
            }

            return $this->sendResponse($colecion,'Oren Actualizado!');

        }else{
            return $this->sendError('Error al actualizar el orden!');
        }
    }
}

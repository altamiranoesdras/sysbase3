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


    /**
     * OptionController constructor.
     * @param array $iconos
     */
    public function __construct()
    {
        $this->middleware('permission:Ver opcion menu')->only('show');
        $this->middleware('permission:Crear opcion menu')->only(['create','store']);
        $this->middleware('permission:Editar opcion menu')->only(['edit','update']);
        $this->middleware('permission:Eliminar opcion menu')->only('destroy');
    }


    /**
     * Display a listing of the Option.
     *
     * @param OptionDataTable $optionDataTable
     * @return Response
     */
    public function index()
    {
        return view('admin.options.index');
    }

    /**
     * Show the form for creating a new Option.
     *
     * @return Response
     */
    public function create(Option $option)
    {
        $parent = $option ?? null;


        return view('admin.options.create',compact('parent'));
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

        $parent = $option->parent ?? null;

        return view('admin.options.edit',compact('option','parent'));
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

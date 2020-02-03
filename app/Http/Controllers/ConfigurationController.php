<?php

namespace App\Http\Controllers;

use App\DataTables\ConfigurationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateConfigurationRequest;
use App\Http\Requests\UpdateConfigurationRequest;
use App\Models\Configuration;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ConfigurationController extends AppBaseController
{
    /**
     * ConfigurationController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:configurations.index')->only('index');
        $this->middleware('permission:configurations.show')->only('show');
        $this->middleware('permission:configurations.create')->only(['create','store']);
        $this->middleware('permission:configurations.edit')->only(['edit','update']);
        $this->middleware('permission:configurations.destroy')->only('destroy');
    }


    /**
     * Display a listing of the Configuration.
     *
     * @param ConfigurationDataTable $configurationDataTable
     * @return Response
     */
    public function index(ConfigurationDataTable $configurationDataTable)
    {
        return $configurationDataTable->render('admin.configurations.index');
    }

    /**
     * Show the form for creating a new Configuration.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.configurations.create');
    }

    /**
     * Store a newly created Configuration in storage.
     *
     * @param CreateConfigurationRequest $request
     *
     * @return Response
     */
    public function store(CreateConfigurationRequest $request)
    {
        $input = $request->all();

        /** @var Configuration $configuration */
        $configuration = Configuration::create($input);

        Flash::success('Configuration saved successfully.');

        return redirect(route('configurations.index'));
    }

    /**
     * Display the specified Configuration.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Configuration $configuration */
        $configuration = Configuration::find($id);

        if (empty($configuration)) {
            Flash::error('Configuration not found');

            return redirect(route('configurations.index'));
        }

        return view('admin.configurations.show')->with('configuration', $configuration);
    }

    /**
     * Show the form for editing the specified Configuration.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Configuration $configuration */
        $configuration = Configuration::find($id);

        if (empty($configuration)) {
            Flash::error('Configuration not found');

            return redirect(route('configurations.index'));
        }

        return view('admin.configurations.edit')->with('configuration', $configuration);
    }

    /**
     * Update the specified Configuration in storage.
     *
     * @param  int              $id
     * @param UpdateConfigurationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConfigurationRequest $request)
    {
        /** @var Configuration $configuration */
        $configuration = Configuration::find($id);

        if (empty($configuration)) {
            Flash::error('Configuration not found');

            return redirect(route('configurations.index'));
        }

        $configuration->fill($request->all());
        $configuration->save();

        flash('Configuration updated successfully.')->error();

        return redirect(route('configurations.index'));
    }

    /**
     * Remove the specified Configuration from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Configuration $configuration */
        $configuration = Configuration::find($id);

        if (empty($configuration)) {
            Flash::error('Configuration not found');

            return redirect(route('configurations.index'));
        }

        $configuration->delete();

        Flash::success('Configuration deleted successfully.');

        return redirect(route('configurations.index'));
    }
}

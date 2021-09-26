<?php

namespace App\Http\Controllers;

use App\DataTables\RoleDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Illuminate\View\View;
use Response;

class RoleController extends AppBaseController
{
    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:Ver roles')->only('show');
        $this->middleware('permission:Crear roles')->only(['create','store']);
        $this->middleware('permission:Editar roles')->only(['edit','update']);
        $this->middleware('permission:Eliminar roles')->only('destroy');
    }

    /**
     * Display a listing of the Role.
     *
     * @param RoleDataTable $roleDataTable
     * @return Response
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('admin.roles.index');
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();

        try {
            DB::beginTransaction();

            /** @var Role $role */
            $role = Role::create($input);

            $permissions = Permission::whereIn('id',$request->permissions ?? [])->get();

            $role->syncPermissions($permissions);

            $opciones = $request->options ?  explode(",",$request->options) : [];
            $role->options()->sync($opciones);

        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception);
        }

        DB::commit();


        flash()->success('Role guardado exitosamente.');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param  int $id
     *
     * @return View
     */
    public function show($id)
    {
        /** @var Role $role */
        $role = Role::find($id);

        if (empty($role)) {
            flash()->error('Role not found');

            return redirect(route('roles.index'));
        }


        return view('admin.roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int $id
     *
     * @return View
     */
    public function edit($id)
    {
        /** @var Role $role */
        $role = Role::find($id);

        if (empty($role)) {
            flash()->error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('admin.roles.edit')->with('role', $role);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param  int              $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        /** @var Role $role */
        $role = Role::find($id);

        if (empty($role)) {
            flash()->error('Role not found');

            return redirect(route('roles.index'));
        }



        try {
            DB::beginTransaction();

            $role->fill($request->all());
            $role->save();

            $permissions = Permission::whereIn('id',$request->permissions ?? [])->get();

            $role->syncPermissions($permissions);

            $opciones = $request->options ?  explode(",",$request->options) : [];
            $role->options()->sync($opciones);

        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception);
        }

        DB::commit();

        flash()->success('Role actualizado exitosamente.');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Role $role */
        $role = Role::find($id);

        if (empty($role)) {
            flash()->error('Role not found');

            return redirect(route('roles.index'));
        }

        $role->delete();

        flash()->success('Role borrado exitosamente.');

        return redirect(route('roles.index'));
    }
}

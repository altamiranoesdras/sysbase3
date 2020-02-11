<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Option;
use App\Models\Role;
use App\Models\User;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class UserController extends AppBaseController
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:users.index')->only('index');
        $this->middleware('permission:users.show')->only('show');
        $this->middleware('permission:users.create')->only(['create','store']);
        $this->middleware('permission:users.edit')->only(['edit','update']);
        $this->middleware('permission:users.destroy')->only('destroy');
    }


    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('admin.users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        try {
            DB::beginTransaction();


            /** @var User $user */
            $user = User::create($input);

            if ($request->hasFile('avatar')){
                $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
            }

            $user->syncRoles($request->roles);
            $user->syncPermissions($request->permissions_user);

        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception);
        }

        DB::commit();

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var User $user */
        $user = User::find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(User $user)
    {
        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        if (!$this->canEditUser($user)){
            return  redirect(route('users.index'));
        }

        $user->setAttribute('permissions_user',$user->permissions);

        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        if ($request->roles){
            $authUser = auth()->user();

            $maxRolUserAuth = $authUser->roles->min('id');

            /**
            * DEVELOPER =   1;
            * SUPERADMIN =  2;
            * ADMIN =       3;
            * TESTER =      4;
            * USER =        5;
             */
            //si el maximo rol del usuario es inferior al rol admin
            if (Role::ADMIN < $maxRolUserAuth){
                flash(__('You do not have sufficient permissions to associate roles with users'))->error();
                return  redirect(route('users.edit',$user->id));
            }else{
                //si de los roles que se trata de asociar hay uno mayor al mayor del usuario autenticado
                if ( min($request->roles) < $maxRolUserAuth ){
                    flash(__('You cannot associate roles superior to yours'))->error();
                    return  redirect(route('users.edit',$user->id));
                }
            }

        }


        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        try {
            DB::beginTransaction();
            $user->fill($request->all());
            $user->save();

            if ($request->hasFile('avatar')){
                $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
            }

            $user->syncRoles($request->roles);
            $user->syncPermissions($request->permissions_user);

        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception);
        }

        DB::commit();



        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(User $user)
    {

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        if (!$this->canDeleteUser($user)){
            return  redirect(route('users.index'));
        }

        try {
            DB::beginTransaction();

            $user->email= $user->email.".bk".$user->id;
            $user->username= $user->username.".bk".$user->id;
            $user->save();
            $user->delete();

        } catch (\Exception $exception) {
            DB::rollBack();

            throw new \Exception($exception);
        }

        DB::commit();



        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Muestra al vista para poder asignar opciones del menu a un usuario
     *
     * @param $id id del usuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function menu(User $user){

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        if (!$this->canEditMenu($user)){
            return  redirect(route('users.index'));
        }

        return view("admin.users.menu",compact('user'));
    }

    /**
     * Guarda lsa opciones de menu que se decidieron asignar al usuario
     *
     * @param Request $request
     * @param $id usuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function menuStore(User $user,Request $request){


        $opciones = explode(",",$request->options);

        $user->options()->sync($opciones);

        Flash::success('Menu del usuario actualizado!')->important();

        return redirect(route('users.index'));
    }

    public function canEditUser(User $user)
    {

        //si el usuario a editar tiene un rol superior al usuario autenticado
        if ($user->roles->min('id') < auth()->user()->roles->min('id') ){
            flash(__('You cannot edit user with role superior to yours'))->error();
            return false;
        }

        return true;
    }

    public function canDeleteUser(User $user)
    {
        //si el usuario a editar tiene un rol superior al usuario autenticado
        if ($user->roles->min('id') < auth()->user()->roles->min('id') ){
            flash(__('You cannot delete user with role superior to yours'))->error();
            return false;
        }

        return true;
    }

    public function canEditMenu(User $user)
    {
        //si el usuario a editar tiene un rol superior al usuario autenticado
        if ($user->roles->min('id') < auth()->user()->roles->min('id') ){
            flash(__('You cannot edit user menu with role superior to yours'))->error();
            return false;
        }

        return true;
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserAPIRequest;
use App\Http\Requests\API\UpdateUserAPIRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UserController
 * @package App\Http\Controllers\API
 */

class UserAPIController extends AppBaseController
{
    /**
     * Display a listing of the User.
     * GET|HEAD /users
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $users = $query->get();

        return $this->sendResponse($users->toArray(), 'Users retrieved successfully');
    }

    /**
     * Store a newly created User in storage.
     * POST /users
     *
     * @param CreateUserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserAPIRequest $request)
    {
        $input = $request->all();

        /** @var User $user */
        $user = User::create($input);

        return $this->sendResponse($user->toArray(), 'User saved successfully');
    }

    /**
     * Display the specified User.
     * GET|HEAD /users/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var User $user */
        $user = User::with(['shortcuts','options' => function($q){
            $q->whereNotNull('ruta');
        }])->find($id);

        if (empty($user)) {
            return $this->sendError('User no encontrado');
        }

        return $this->sendResponse($user->toArray(), 'User recuperado con éxito');
    }

    /**
     * Update the specified User in storage.
     * PUT/PATCH /users/{id}
     *
     * @param  int $id
     * @param UpdateUserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserAPIRequest $request)
    {
        /** @var User $user */
        $user = User::find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $user->fill($request->all());
        $user->save();

        return $this->sendResponse($user->toArray(), 'User updated successfully');
    }

    /**
     * Remove the specified User from storage.
     * DELETE /users/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var User $user */
        $user = User::find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $user->delete();

        return $this->sendSuccess('User deleted successfully');
    }

    public function addShortcut(User $user,Request $request)
    {

        if (empty($user)) {
            return $this->sendError('User no encontrado');
        }

        if ($user->shortcuts->contains('id',$request->option)){
            return $this->sendError('Ya cuentas con el '.__('Shortcut'));
        }

        $user->shortcuts()->attach($request->option);


        return $this->sendResponse($user->toArray(), 'Listo!');
    }

    public function removeShortcut(User $user,Request $request)
    {

        if (empty($user)) {
            return $this->sendError('User no encontrado');
        }


        $user->shortcuts()->detach($request->option);


        return $this->sendResponse($user->toArray(), 'Listo!');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOptionAPIRequest;
use App\Http\Requests\API\UpdateOptionAPIRequest;
use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OptionController
 * @package App\Http\Controllers\API
 */

class OptionAPIController extends AppBaseController
{
    /**
     * Display a listing of the Option.
     * GET|HEAD /options
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Option::query()->with('children');

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        if ($request->parentes){
            $query->padres();

            return Response::json($query->get());
        }

        $options = $query->get();

        return $this->sendResponse($options->toArray(), 'Options retrieved successfully');
    }

    /**
     * Store a newly created Option in storage.
     * POST /options
     *
     * @param CreateOptionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOptionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Option $option */
        $option = Option::create($input);

        return $this->sendResponse($option->toArray(), 'Option saved successfully');
    }

    /**
     * Display the specified Option.
     * GET|HEAD /options/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Option $option */
        $option = Option::find($id);

        if (empty($option)) {
            return $this->sendError('Option not found');
        }

        return $this->sendResponse($option->toArray(), 'Option retrieved successfully');
    }

    /**
     * Update the specified Option in storage.
     * PUT/PATCH /options/{id}
     *
     * @param int $id
     * @param UpdateOptionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOptionAPIRequest $request)
    {
        /** @var Option $option */
        $option = Option::find($id);

        if (empty($option)) {
            return $this->sendError('Option not found');
        }

        $option->fill($request->all());
        $option->save();

        return $this->sendResponse($option->toArray(), 'Option updated successfully');
    }

    /**
     * Remove the specified Option from storage.
     * DELETE /options/{id}
     *
     * @param int $id
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
            return $this->sendError('Option not found');
        }

        $option->delete();

        return $this->sendSuccess('Option deleted successfully');
    }
}

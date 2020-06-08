<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePropertyRequest;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Resources\PropertyResource;
use App\Http\Requests\StorePropertyRequest;
use Illuminate\Support\Facades\Log;

class PropertyController extends Controller
{

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $properties = Property::all();

        return PropertyResource::collection($properties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }


    /**
     * @param \App\Http\Requests\StorePropertyRequest $request
     *
     * @return \App\Http\Resources\PropertyResource
     */
    public function store(StorePropertyRequest $request)
    {
        $validated = $request->validated();

        $property = Property::create($validated);

        Log::info('Property created');

        return new PropertyResource($property);
    }


    /**
     * @param \App\Property $property
     *
     * @return \App\Http\Resources\PropertyResource
     */
    public function show(Property $property)
    {
        return new PropertyResource($property);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Property $property
     *
     * @return void
     */
    public function edit(Property $property)
    {
        //
    }


    /**
     * @param \App\Http\Requests\UpdatePropertyRequest $request
     * @param \App\Property                            $property
     *
     * @return \App\Http\Resources\PropertyResource
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $property->update($request->all());

        return new PropertyResource($property);
    }


    /**
     * @param \App\Property $property
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Property $property)
    {
        Log::info('Property deleted with id  ' . $property->id);

        $property->delete();

        return response()->json(null, 204);
    }
}

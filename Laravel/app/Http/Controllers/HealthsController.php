<?php

namespace App\Http\Controllers;

use App\Http\Requests\HealthRequest;
use App\Http\Resources\HealthsResource;
use App\Models\Health;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class HealthsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize("health.index");
        return HealthsResource::collection(Health::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HealthRequest $request)
    {
        $data = $request->validated();
        $health = Health::create($data);
        return new HealthsResource($health);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Gate::authorize("health.show");
        $health = Health::findOrFail($id);
        return new HealthsResource($health);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HealthRequest $request, $id)
    {
        Gate::authorize("health.update");
        $data = $request->validated();
        $health = Health::findOrFail($id);
        $health->update($data);
        return new HealthsResource($health);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Gate::authorize("health.destroy");
            $health = Health::findOrFail($id);
            $health->delete();
            return response()->json(null, 204);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Not Found'], 404);
        }
    }
}

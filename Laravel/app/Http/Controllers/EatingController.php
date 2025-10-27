<?php

namespace App\Http\Controllers;

use App\Http\Requests\EatRequest;
use App\Http\Resources\EatResource;
use App\Models\Eating;
use App\Models\Event;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class EatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize("eat.index");
        $eventIds = Event::where('user_id', auth()->id())->pluck('id');
        $eatings = Eating::whereIn('event_id', $eventIds)->get();
    
        return EatResource::collection($eatings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EatRequest $request)
    {
        Gate::authorize("eat.store");
        $data = $request->validated();
        $eat = Eating::create($data);
        return new EatResource($eat);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Gate::authorize("eat.show");
        $eat = Eating::findOrFail($id);
        return new EatResource($eat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EatRequest $request, $id)
    {
        Gate::authorize("eat.update");
        $data = $request->validated();
        $eat = Eating::findOrFail($id);
        $eat->update($data);
        return new EatResource($eat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            Gate::authorize("eat.destroy");
            $eat = Eating::findOrFail($id);
            $eat->delete();
            return response()->json(null,204);
        }
        catch(Exception $exception){
            return response()->json(['error'=>'Not Found'],404);
        }
    }
}

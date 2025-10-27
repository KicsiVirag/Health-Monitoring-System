<?php

namespace App\Http\Controllers;

use App\Http\Requests\SleepRequest;
use App\Http\Resources\SleepResource;
use App\Models\Event;
use App\Models\Sleep;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class SleepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize("sleep.index");
        $eventIds = Event::where('user_id', auth()->id())->pluck('id');
        $sleeps = Sleep::whereIn('event_id', $eventIds)->get();
    
        return SleepResource::collection($sleeps);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SleepRequest $request)
    {
        Gate::authorize("sleep.store");
        $data = $request->validated();
        $sleep = Sleep::create($data);
        return new SleepResource($sleep);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Gate::authorize("sleep.show");
        $sleep = Sleep::findOrFail($id);
        return new SleepResource($sleep);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SleepRequest $request, $id)
    {
        Gate::authorize("sleep.update");
        $data = $request->validated();
        $sleep = Sleep::findOrFail($id);
        $sleep->update($data);
        return new SleepResource($sleep);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            Gate::authorize("sleep.destroy");
            $sleep = Sleep::findOrFail($id);
            $sleep->delete();
            return response()->json(null,204);
        }
        catch(Exception $exception){
            return response()->json(['error'=>'Not Found'],404);
        }
    }
}

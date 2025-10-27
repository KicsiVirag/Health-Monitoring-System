<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Resources\EventsResource;
use App\Models\Event;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize("event.index");
        return EventsResource::collection(Event::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        Gate::authorize("event.store");
        $data = $request->validated();
        $event = Event::create($data);
        return new EventsResource($event);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Gate::authorize("event.show");
        $event = Event::findOrFail($id);
        return new EventsResource($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, $id)
    {
        Gate::authorize("event.update");
        $data = $request->validated();
        $event = Event::findOrFail($id);
        $event->update($data);
        return new EventsResource($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            Gate::authorize("event.destroy");
            $event = Event::findOrFail($id);
            $event->delete();
            return response()->json(null,204);
        }
        catch(Exception $exception){
            return response()->json(['error'=>'Not Found'],404);
        }
    }
}

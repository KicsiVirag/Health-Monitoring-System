<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeasureRequest;
use App\Http\Resources\MeasureResource;
use App\Models\Event;
use App\Models\Measure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class MeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize("measure.index");
        $eventIds = Event::where('user_id', auth()->id())->pluck('id');
        $measures = Measure::whereIn('event_id', $eventIds)->get();
    
        return MeasureResource::collection($measures);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MeasureRequest $request)
    {
        Gate::authorize("measure.store");
        $data = $request->validated();
        $measure = Measure::create($data);
        return new MeasureResource($measure);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Gate::authorize("measure.show");
        $measure = Measure::findOrFail($id);
        return new MeasureResource($measure);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MeasureRequest $request, $id)
    {
        Gate::authorize("measure.update");
        $data = $request->validated();
        $measure = Measure::findOrFail($id);
        $measure->update($data);
        return new MeasureResource($measure);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            Gate::authorize("measure.destroy");
            $measure = Measure::findOrFail($id);
            $measure->delete();
            return response()->json(null,204);
        }
        catch(Exception $exception){
            return response()->json(['error'=>'Not Found'],404);
        }
    }
}

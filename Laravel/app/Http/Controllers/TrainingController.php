<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingRequest;
use App\Http\Resources\TrainingResource;
use App\Models\Event;
use App\Models\Training;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize("training.index");
        $eventIds = Event::where('user_id', auth()->id())->pluck('id');
        $trainings = Training::whereIn('event_id', $eventIds)->get();
    
        return TrainingResource::collection($trainings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainingRequest $request)
    {
        Gate::authorize("training.store");
        $data = $request->validated();
        $training = Training::create($data);
        return new TrainingResource($training);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize("training.show");
        $training = Training::findOrFail($id);
        return new TrainingResource($training);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainingRequest $request, $id)
    {
        Gate::authorize("training.update");
        $data = $request->validated();
        $training = Training::findOrFail($id);
        $training->update($data);
        return new TrainingResource($training);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Gate::authorize("training.destroy");
            $training = Training::findOrFail($id);
            $training->delete();
            return response()->json(null, 204);
        } catch (Exception $exception) {
            return response()->json(['error' => 'Not Found'], 404);
        }
    }
}

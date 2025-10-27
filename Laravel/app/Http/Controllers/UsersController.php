<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize("user.index");
        return UserResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        Gate::authorize("user.show");
        return new UserResource(auth()->user());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        Gate::authorize("user.update");
        $data = $request->validated();
        $user = User::findOrFail($id);
        $user->update($data);
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            Gate::authorize("user.destroy");
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(null,204);
        }
        catch(Exception $exception){
            return response()->json(['error'=>'Not Found'],404);
        }
    }
}

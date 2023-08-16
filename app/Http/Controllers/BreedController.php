<?php

namespace App\Http\Controllers;

use App\Http\Resources\BreedCollection;
use App\Http\Resources\BreedResource;
use App\Models\Breed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BreedController extends Controller
{
    //GET
    //localhost:8000/api/breeds
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return BreedResource::collection(Breed::all());
        return new BreedCollection(Breed::all());
    }


    //POST
    //localhost:8000/api/breeds
    //BODY = Breed Model

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $breed = Breed::create($input);
        return response()->json([
            "success" => true,
            "message" => "Breed created successfully.",
            "data" => $breed
        ]);
    }

    //GET
    //localhost:8000/api/breeds/{breedID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  integer  $breedID
     * @return \Illuminate\Http\Response
     */
    public function show($breedID)
    {
        $breed = Breed::find($breedID);
        return is_null($breed) ? response()->json('Data not found', 404) : new BreedResource($breed);
    }


    //DELETE
    //localhost:8000/api/breeds/{breedID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $breedID
     * @return \Illuminate\Http\Response
     */
    public function destroy($breedID)
    {
        $breed = Breed::where('id', $breedID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Breed deleted successfully.",
            "data" => $breed
        ]);
    }
}

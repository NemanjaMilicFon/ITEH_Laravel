<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatCollection;
use App\Http\Resources\CatResource;
use App\Models\Cat;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatController extends Controller
{
    //GET
    //localhost:8000/api/cats
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return CatResource::collection(Cat::all());
        return new CatCollection(Cat::all());
    }

    //GET
    //localhost:8000/api/cats/{catID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  integer  $catID
     * @return \Illuminate\Http\Response
     */
    public function show($catID)
    {
        $cat = Cat::find($catID);
        return is_null($cat) ? response()->json('Data not found', 404) : new CatResource($cat);
    }


    //DELETE
    //localhost:8000/api/cats/{catID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $catID
     * @return \Illuminate\Http\Response
     */
    public function destroy($catID)
    {
        $cat = Cat::where('id', $catID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Cat deleted successfully.",
            "data" => $cat
        ]);
    }
}

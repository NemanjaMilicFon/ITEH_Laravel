<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatCollection;
use App\Models\Cat;
use Illuminate\Http\Request;

class OwnerCatController extends Controller
{
    public function index($ownerID)
    {
        $cats = Cat::get()->where('owner_id', $ownerID);
        if(is_null($cats)) {
            return response()->json('Data not found', 404);
        }
        return new CatCollection($cats);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LugaresCategoria;

class LugaresCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(LugaresCategoria::orderBy('nombre')->get());
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return response()->json(LugaresCategoria::findOrfail($id));
    }
}

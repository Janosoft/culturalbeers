<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lugar;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Lugar::orderBy('nombre')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return response()->json(Lugar::findOrfail($id));
    }

    /**
     * Muestra una lista de nombres similares al buscado, en formato JSON
     *
     * @param  string  $nombre
     * @return \Illuminate\Http\JsonResponse
     */
    public function query(string $nombre)
    {
        $data = Lugar::where('nombre', 'LIKE', "%{$nombre}%")
            ->orderby('nombre')
            ->limit(5)
            ->get()
            ->pluck('nombre');

        return response()->json($data);
    }
}

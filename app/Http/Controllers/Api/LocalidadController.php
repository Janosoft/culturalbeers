<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Localidad;
use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Localidad::orderBy('nombre')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return response()->json(Localidad::findOrfail($id));
    }

    /**
     * Muestra una lista de nombres similares al buscado, en formato JSON
     *
     * @param  string  $nombre
     * @return \Illuminate\Http\JsonResponse
     */
    public function query(string $nombre)
    {
        $data = Localidad::
            where("nombre", "LIKE", "%{$nombre}%")
            ->orderby("nombre")
            ->limit(5)
            ->get()
            ->pluck("nombre");

        return response()->json($data);
    }
}

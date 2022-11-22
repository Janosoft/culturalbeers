<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoresFabricacion;

class ProductoresFabricacionController extends Controller
{
    public function index()
    {
        $productores_fabricaciones= ProductoresFabricacion::paginate();
        return view('productores_fabricaciones.index', compact('productores_fabricaciones'));
    }

    public function create()
    {
        return view('productores_fabricaciones.create');
    }

    public function show($productores_fabricacion)
    {
        return view('productores_fabricaciones.show', compact('productores_fabricacion'));
    }
}

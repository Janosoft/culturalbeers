<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productor;

class ProductorController extends Controller
{
    public function index()
    {
        $productores= Productor::paginate();
        return view('productores.index', compact('productores'));
    }

    public function create()
    {
        return view('productores.create');
    }

    public function show($productor)
    {
        return view('productores.show', compact('productor'));
    }
}

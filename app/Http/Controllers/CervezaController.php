<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cerveza;

class CervezaController extends Controller
{
    public function index()
    {
        $cervezas= Cerveza::paginate();
        return view('cervezas.index', compact('cervezas'));
    }

    public function create()
    {
        return view('cervezas.create');
    }

    public function show($cerveza)
    {
        return view('cervezas.show', compact('cerveza'));
    }
}

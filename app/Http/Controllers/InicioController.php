<?php

namespace App\Http\Controllers;

class InicioController extends Controller
{

    public function test()
    {
        return view('test');
    }

    public function __invoke()
    {
        return view('inicio');
    }
}

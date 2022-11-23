<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CervezasEnvase;

class CervezasEnvaseController extends Controller
{
    public function index()
    {
        $cervezas_envases = CervezasEnvase::paginate();
        return view('cervezas_envases.index', compact('cervezas_envases'));
    }

    public function create()
    {
        return view('cervezas_envases.create');
    }

    public function show($envase_id)
    {
        $cervezas_envase = CervezasEnvase::find($envase_id);
        return view('cervezas_envases.show', compact('cervezas_envase'));
    }
}

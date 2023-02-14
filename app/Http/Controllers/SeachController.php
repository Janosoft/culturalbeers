<?php

namespace App\Http\Controllers;

use App\Models\Cerveza;
use App\Models\CervezasEstilo;
use App\Models\CervezasFermento;
use App\Models\DivisionPolitica;
use App\Models\Localidad;
use App\Models\Lugar;
use App\Models\Pais;
use App\Models\Productor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SeachController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');

        if (! empty($search)) {
            $cervezas = Cerveza::query()
                ->where('nombre', 'LIKE', "%{$search}%")
                ->orderBy('nombre')
                ->get();
            $cervezas_estilos = CervezasEstilo::query()
                ->where('nombre', 'LIKE', "%{$search}%")
                ->orderBy('nombre')
                ->get();
            $cervezas_fermentos = CervezasFermento::query()
                ->where('nombre', 'LIKE', "%{$search}%")
                ->orderBy('nombre')
                ->get();
            $divisiones_politicas = DivisionPolitica::query()
                ->where('nombre', 'LIKE', "%{$search}%")
                ->orderBy('nombre')
                ->get();
            $localidades = Localidad::query()
                ->where('nombre', 'LIKE', "%{$search}%")
                ->orderBy('nombre')
                ->get();
            $lugares = Lugar::query()
                ->where('nombre', 'LIKE', "%{$search}%")
                ->orderBy('nombre')
                ->get();
            $paises = Pais::query()
                ->where('nombre', 'LIKE', "%{$search}%")
                ->orderBy('nombre')
                ->get();
            $productores = Productor::query()
                ->where('nombre', 'LIKE', "%{$search}%")
                ->orderBy('nombre')
                ->get();
        } else {
            $cervezas = new Collection();
            $cervezas_estilos = new Collection();
            $cervezas_fermentos = new Collection();
            $divisiones_politicas = new Collection();
            $localidades = new Collection();
            $lugares = new Collection();
            $paises = new Collection();
            $productores = new Collection();
        }

        return view('search', compact([
            'search',
            'cervezas',
            'cervezas_estilos',
            'cervezas_fermentos',
            'divisiones_politicas',
            'localidades',
            'lugares',
            'paises',
            'productores',
        ]));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cerveza;
use App\Models\CervezasColor;
use App\Models\CervezasEnvaseTipo;
use App\Models\CervezasEstilo;
use App\Models\CervezasFamilia;
use App\Models\CervezasFermento;
use App\Models\DivisionPolitica;
use App\Models\Localidad;
use App\Models\Pais;
use App\Models\Persona;
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
            $cervezas_colores = CervezasColor::query()
                ->where('nombre', 'LIKE', "%{$search}%")
                ->orderBy('nombre')
                ->get();
            $cervezas_envases_tipos = CervezasEnvaseTipo::query()
                ->where('nombre', 'LIKE', "%{$search}%")
                ->orderBy('nombre')
                ->get();
            $cervezas_estilos = CervezasEstilo::query()
                ->where('nombre', 'LIKE', "%{$search}%")
                ->orderBy('nombre')
                ->get();
            $cervezas_familias = CervezasFamilia::query()
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
            $paises = Pais::query()
                ->where('nombre', 'LIKE', "%{$search}%")
                ->orderBy('nombre')
                ->get();
            $personas = Persona::query()
                ->where('nombre', 'LIKE', "%{$search}%")
                ->orWhere('apellido', 'LIKE', "%{$search}%")
                ->orderBy('nombre')
                ->orderBy('apellido')
                ->get();
            $productores = Productor::query()
                ->where('nombre', 'LIKE', "%{$search}%")
                ->orderBy('nombre')
                ->get();
        } else {
            $cervezas = new Collection();
            $cervezas_colores = new Collection();
            $cervezas_envases_tipos = new Collection();
            $cervezas_estilos = new Collection();
            $cervezas_familias = new Collection();
            $cervezas_fermentos = new Collection();
            $divisiones_politicas = new Collection();
            $localidades = new Collection();
            $paises = new Collection();
            $personas = new Collection();
            $productores = new Collection();
        }

        return view('search', compact([
            'search',
            'cervezas',
            'cervezas_colores',
            'cervezas_envases_tipos',
            'cervezas_estilos',
            'cervezas_familias',
            'cervezas_fermentos',
            'divisiones_politicas',
            'localidades',
            'paises',
            'personas',
            'productores',
        ]));
    }
}

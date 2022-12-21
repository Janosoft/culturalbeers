<?php

namespace App\Http\Controllers;

use App\Models\Cerveza;
use App\Http\Requests\StoreCerveza;
use App\Models\CervezasColor;
use App\Models\CervezasEnvaseTipo;
use App\Models\CervezasEstilo;
use App\Models\Imagen;
use App\Models\Productor;

class CervezaController extends Controller
{
    public function index()
    {
        $cervezas = Cerveza::orderBy('nombre')->paginate();
        return view('cervezas.index', compact('cervezas'));
    }

    public function create()
    {
        $productores = Productor::pluck('nombre', 'productor_id');
        $colores = CervezasColor::pluck('nombre', 'color_id');
        $estilos = CervezasEstilo::pluck('nombre', 'estilo_id');
        $envases_tipos = CervezasEnvaseTipo::pluck('nombre', 'envase_id');
        return view('cervezas.create', compact(['productores', 'colores', 'estilos', 'envases_tipos']));
    }

    public function store(StoreCerveza $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cerveza = Cerveza::create($request->all());
        $cerveza->envases()->sync($request->envases);
        if ($request->imagen) {
            $fileName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('storage/imagenes'), $fileName);
            Imagen::create([
                'imageable_id' => $cerveza->cerveza_id,
                'url' => 'imagenes/' . $fileName,
                'imageable_type' => Cerveza::class,
            ]);
        }
        return redirect()->route('cervezas.show', $cerveza);
    }

    public function show(Cerveza $cerveza)
    {
        return view('cervezas.show', compact('cerveza'));
    }

    public function edit(Cerveza $cerveza)
    {
        $productores = Productor::pluck('nombre', 'productor_id');
        $colores = CervezasColor::pluck('nombre', 'color_id');
        $estilos = CervezasEstilo::pluck('nombre', 'estilo_id');
        $envases_tipos = CervezasEnvaseTipo::pluck('nombre', 'envase_id');
        $envases = $cerveza->envases->pluck('envase_id');
        return view('cervezas.edit', compact(['cerveza', 'productores', 'colores', 'estilos', 'envases_tipos', 'envases']));
    }

    public function update(StoreCerveza $request, Cerveza $cerveza)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cerveza->update($request->all());
        $cerveza->envases()->sync($request->envases);
        return redirect()->route('cervezas.show', $cerveza);
    }

    public function destroy(Cerveza $cerveza)
    {
        $cerveza->delete();
        return redirect()->route('cervezas.index');
    }
}

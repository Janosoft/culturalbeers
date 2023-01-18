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
        $productor = Productor::where('productor_id', $request->productor_id)->first();
        $request['slug'] = str()->slug($productor->nombre . '-' . $request->nombre, '-', 'es');
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
        session()->flash('statusTitle', 'Cerveza Creada');
        session()->flash('statusMessage', 'La cerveza fue creada correctamente.');
        session()->flash('statusColor', 'success');

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
        $productor = Productor::where('productor_id', $request->productor_id)->first();
        $request['slug'] = str()->slug($productor->nombre . '-' . $request->nombre, '-', 'es');
        $cerveza->update($request->all());
        $cerveza->envases()->sync($request->envases);
        session()->flash('statusTitle', 'Cerveza Actualizada');
        session()->flash('statusMessage', 'La cerveza fue actualizada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas.show', $cerveza);
    }

    public function destroy(Cerveza $cerveza)
    {
        $cerveza->delete();
        session()->flash('statusTitle', 'Cerveza Eliminada');
        session()->flash('statusMessage', 'La cerveza fue eliminada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCerveza;
use App\Http\Requests\StoreComentario;
use App\Http\Requests\StorePuntaje;
use App\Models\Cerveza;
use App\Models\CervezasColor;
use App\Models\CervezasEnvaseTipo;
use App\Models\CervezasEstilo;
use App\Models\Comentario;
use App\Models\Follow;
use App\Models\Imagen;
use App\Models\Productor;
use App\Models\Puntaje;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CervezaController extends Controller
{
    public function index()
    {
        $cervezas = Cerveza::withTrashed()
            ->orderBy('deleted_at')
            ->orderBy('nombre')
            ->paginate();

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
        $request['user_id'] = Auth::user()->user_id;
        $cerveza = Cerveza::create($request->all());
        $cerveza->envases()->sync($request->envases);
        if ($request->imagen) {
            $fileName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('storage/imagenes'), $fileName);
            $imagen = Imagen::create([
                'imageable_id' => $cerveza->cerveza_id,
                'url' => 'imagenes/' . $fileName,
                'imageable_type' => Cerveza::class,
                'user_id' => Auth::user()->user_id,
            ]);
            $cerveza->imagen_id = $imagen->imagen_id;
            $cerveza->update(['imagen_id']);
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

        return view('cervezas.edit', compact(['cerveza', 'productores', 'colores', 'estilos', 'envases_tipos']));
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

    public function comment(StoreComentario $request, Cerveza $cerveza)
    {
        Comentario::create([
            'comentario' => $request->comentario,
            'commentable_type' => Cerveza::class,
            'commentable_id' => $cerveza->cerveza_id,
            'user_id' => Auth::user()->user_id,
        ]);

        session()->flash('statusTitle', 'Comentario Creado');
        session()->flash('statusMessage', 'El comentario fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas.show', $cerveza);
    }

    public function taste(Cerveza $cerveza)
    {
        $cerveza->usuarios_que_probaron()->attach(Auth::user()->user_id);
        session()->flash('statusTitle', 'Cerveza Probada');
        session()->flash('statusMessage', 'La cerveza fue marcada como probada correctamente.');
        session()->flash('statusColor', 'success');

        return Redirect::back();
    }

    public function untaste(Cerveza $cerveza)
    {
        $cerveza->usuarios_que_probaron()->detach(Auth::user()->user_id);
        session()->flash('statusTitle', 'Cerveza No Probada');
        session()->flash('statusMessage', 'La cerveza fue desmarcada como probada correctamente.');
        session()->flash('statusColor', 'warning');

        return Redirect::back();
    }

    public function follow(Cerveza $cerveza)
    {
        Follow::create([
            'followable_type' => Cerveza::class,
            'followable_id' => $cerveza->cerveza_id,
            'user_id' => Auth::user()->user_id,
        ]);
        session()->flash('statusTitle', 'Cerveza Seguida');
        session()->flash('statusMessage', 'La cerveza fue marcada como seguida correctamente.');
        session()->flash('statusColor', 'success');

        return Redirect::back();
    }

    public function unfollow(Cerveza $cerveza)
    {
        Follow::whereFollowableId($cerveza->cerveza_id)
            ->whereFollowableType(Cerveza::class)
            ->whereUserId(Auth::user()->user_id)
            ->delete();
        session()->flash('statusTitle', 'Cerveza No Seguida');
        session()->flash('statusMessage', 'La cerveza fue desmarcada como seguida correctamente.');
        session()->flash('statusColor', 'warning');

        return Redirect::back();
    }

    public function rate(StorePuntaje $request, Cerveza $cerveza)
    {
        Puntaje::updateOrInsert(
            ['puntuable_type' => Cerveza::class, 'puntuable_id' => $cerveza->cerveza_id, 'user_id' => Auth::user()->user_id],
            ['puntaje' => $request->star]
        );

        session()->flash('statusTitle', 'Cerveza Puntuada');
        session()->flash('statusMessage', 'La cerveza fue puntuada correctamente.');
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

    public function forcedelete(int $cerveza_id)
    {
        $cerveza = Cerveza::withTrashed()->find($cerveza_id);
        $cerveza->forceDelete();
        session()->flash('statusTitle', 'Cerveza Eliminada');
        session()->flash('statusMessage', 'La cerveza fue eliminada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas.index');
    }

    public function restore(int $cerveza_id)
    {
        Cerveza::withTrashed()->find($cerveza_id)->restore();
        session()->flash('statusTitle', 'Cerveza Restaurada');
        session()->flash('statusMessage', 'La cerveza fue restaurada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas.index');
    }
}

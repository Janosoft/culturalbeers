<?php

namespace App\Observers;

use App\Models\Cerveza;
use Illuminate\Support\Facades\Storage;

class CervezaObserver
{
    /**
     * Handle the Cerveza "deleting" event.
     *
     * @return void
     */
    public function deleting(Cerveza $cerveza)
    {
        foreach ($cerveza->imagenes as $imagen) {
            if (Storage::exists($imagen->url)) {
                Storage::delete($imagen->url);
            }
            $imagen->delete();
        }

        foreach ($cerveza->comentarios as $comentario) {
            $comentario->delete();
        }

        foreach ($cerveza->puntajes as $puntaje) {
            $puntaje->delete();
        }
    }
}

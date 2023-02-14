<?php

namespace App\Observers;

use App\Models\Lugar;
use Illuminate\Support\Facades\Storage;

class LugarObserver
{
    /**
     * Handle the Lugar "deleting" event.
     *
     * @return void
     */
    public function deleting(Lugar $lugar)
    {
        foreach ($lugar->imagenes as $imagen) {
            if (Storage::exists($imagen->url)) {
                Storage::delete($imagen->url);
            }
            $imagen->delete();
        }

        foreach ($lugar->comentarios as $comentario) {
            $comentario->delete();
        }
    }
}

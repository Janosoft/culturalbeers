<?php

namespace App\Observers;

use App\Models\Productor;
use Illuminate\Support\Facades\Storage;

class ProductorObserver
{
    /**
     * Handle the Productor "deleting" event.
     *
     * @return void
     */
    public function deleting(Productor $productor)
    {
        foreach ($productor->imagenes as $imagen) {
            if (Storage::exists($imagen->url)) {
                Storage::delete($imagen->url);
            }
            $imagen->delete();
        }

        foreach ($productor->comentarios as $comentario) {
            $comentario->delete();
        }
    }
}

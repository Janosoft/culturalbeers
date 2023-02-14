<?php

namespace App\Observers;

use App\Models\Localidad;

class LocalidadObserver
{
    /**
     * Handle the Fermento "deleting" event.
     *
     * @param  \App\Models\Localidad  $localidad
     * @return void
     */
    public function deleting(Localidad $localidad)
    {
        foreach ($localidad->comentarios as $comentario) {
            $comentario->delete();
        }
    }
}

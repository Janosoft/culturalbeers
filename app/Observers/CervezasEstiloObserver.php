<?php

namespace App\Observers;

use App\Models\CervezasEstilo;

class CervezasEstiloObserver
{
    /**
     * Handle the Estilo "deleting" event.
     *
     * @param  \App\Models\CervezasEstilo  $estilo
     * @return void
     */
    public function deleting(CervezasEstilo $estilo)
    {
        foreach ($estilo->comentarios as $comentario) {
            $comentario->delete();
        }
    }
}

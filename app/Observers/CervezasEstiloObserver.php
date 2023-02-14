<?php

namespace App\Observers;

use App\Models\CervezasEstilo;

class CervezasEstiloObserver
{
    /**
     * Handle the Estilo "deleting" event.
     *
     * @return void
     */
    public function deleting(CervezasEstilo $estilo)
    {
        foreach ($estilo->comentarios as $comentario) {
            $comentario->delete();
        }
    }
}

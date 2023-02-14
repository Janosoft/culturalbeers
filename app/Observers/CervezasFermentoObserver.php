<?php

namespace App\Observers;

use App\Models\CervezasFermento;

class CervezasFermentoObserver
{
    /**
     * Handle the Fermento "deleting" event.
     *
     * @return void
     */
    public function deleting(CervezasFermento $fermento)
    {
        foreach ($fermento->comentarios as $comentario) {
            $comentario->delete();
        }
    }
}

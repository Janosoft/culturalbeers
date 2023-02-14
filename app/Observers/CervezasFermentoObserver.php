<?php

namespace App\Observers;

use App\Models\CervezasFermento;

class CervezasFermentoObserver
{
    /**
     * Handle the Fermento "deleting" event.
     *
     * @param  \App\Models\CervezasFermento  $fermento
     * @return void
     */
    public function deleting(CervezasFermento $fermento)
    {
        foreach ($fermento->comentarios as $comentario) {
            $comentario->delete();
        }
    }
}

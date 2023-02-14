<?php

namespace App\Observers;

use App\Models\CervezasFamilia;

class CervezasFamiliaObserver
{
    /**
     * Handle the Familia "deleting" event.
     *
     * @return void
     */
    public function deleting(CervezasFamilia $familia)
    {
        foreach ($familia->comentarios as $comentario) {
            $comentario->delete();
        }
    }
}

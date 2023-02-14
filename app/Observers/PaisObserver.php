<?php

namespace App\Observers;

use App\Models\Pais;
use Illuminate\Support\Facades\Storage;

class PaisObserver
{
    /**
     * Handle the Pais "deleting" event.
     *
     * @return void
     */
    public function deleting(Pais $pais)
    {
        foreach ($pais->imagenes as $imagen) {
            if (Storage::exists($imagen->url)) {
                Storage::delete($imagen->url);
            }
            $imagen->delete();
        }
    }
}

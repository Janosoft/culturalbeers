<?php

namespace App\Observers;

use App\Models\Persona;
use Illuminate\Support\Facades\Storage;

class PersonaObserver
{
    /**
     * Handle the Persona "deleting" event.
     *
     * @param  \App\Models\Persona  $persona
     * @return void
     */
    public function deleting(Persona $persona)
    {
        foreach ($persona->imagenes as $imagen) {
            if (Storage::exists($imagen->url)) {
                Storage::delete($imagen->url);
            }
            $imagen->delete();
        }
    }
}

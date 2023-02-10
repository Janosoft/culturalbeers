<?php

namespace App\Http\Livewire\Input;

use App\Models\Localidad;
use Livewire\Component;

class Autosuggest extends Component
{
    public $search = "";
    public $datalist = [];

    public function buscarLocalidad()
    {
        if (!empty($this->search)) {
            $localidades = Localidad::query()
                ->where('nombre', 'LIKE', "%{$this->search}%")
                ->orderBy('nombre')
                ->limit(5)
                ->get();

            if (!empty($localidades)) {
                $this->datalist = [];
                foreach ($localidades as $localidad) {
                    array_push($this->datalist, $localidad->nombre);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.input.autosuggest');
    }
}

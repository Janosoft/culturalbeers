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
            $this->datalist = [];
            $localidades = Localidad::query()
                ->where('nombre', 'LIKE', "%{$this->search}%")
                ->orderBy('nombre')
                ->limit(5)
                ->get();

            if (!empty($localidades)) {
                $this->datalist= $localidades->toArray();
            }
        }
    }

    public function render()
    {
        return view('livewire.input.autosuggest');
    }
}

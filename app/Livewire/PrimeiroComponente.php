<?php

namespace App\Livewire;

use Livewire\Component;

class PrimeiroComponente extends Component
{
    public $contador = 10;

    public function incrementar($numero = 0)
    {
        $this->contador = $this->contador + $numero;
    }

    public function decrementar($numero = 0)
    {
        $this->contador = $this->contador - $numero;
    }
    public function render()
    {
        return view('livewire.primeiro-componente');
    }
}

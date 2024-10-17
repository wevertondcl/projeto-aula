<?php

namespace App\Livewire;

use Livewire\Component;

class HomeAgendamento extends Component
{
    public $passoAtual = 1;

    public function mudarPasso($passo = 1)
    {
        $this->passoAtual = $passo;
    }
    public function render()
    {
        return view('livewire.home-agendamento');
    }
}

<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('components.layouts.app-restrita')]
class HomeRestrita extends Component
{
    public function render()
    {
        return view('livewire.home-restrita');
    }
}

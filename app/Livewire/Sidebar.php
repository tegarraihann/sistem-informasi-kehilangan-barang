<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $isOpen = true; // State untuk sidebar terbuka atau tertutup

    public function toggle()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}

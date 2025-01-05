<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\BarangTemuan; // Import model BarangTemuan

class BarangTemuan extends Component
{
    public $barangs;

    public function mount()
    {
        // Mengambil semua data barang temuan dari database
        $this->barangs = BarangTemuan::all();
    }

    public function render()
    {
        return view('livewire.barang-temuan');
    }
}

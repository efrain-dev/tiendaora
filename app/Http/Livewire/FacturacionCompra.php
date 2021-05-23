<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FacturacionCompra extends Component
{
    public $nit, $nombre, $direccion;

    public function render()
    {
        return view('livewire.facturacion-compra');
    }
}

<?php

namespace App\Http\Livewire;

use Asantibanez\LivewireSelect\LivewireSelect;
use Livewire\Component;

class CarModelSelect extends LivewireSelect
{
    public function options($searchTerm = null) : \Illuminate\Support\Collection
    {
        return collect([
            [
                'value' => 'honda',
                'description' => 'Honda',
            ],
            [
                'value' => 'mazda',
                'description' => 'Mazda',
            ],
            [
                'value' => 'tesla',
                'description' => 'Tesla',
            ],
        ]);
    }
}

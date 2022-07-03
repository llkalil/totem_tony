<?php

namespace App\Http\Livewire\Admin\Totens;

use App\Models\Totem;
use Livewire\Component;

class Table extends Component
{
    public $totens;

    public function mount()
    {
        $this->totens = Totem::all();
    }

    public function render()
    {
        return view('livewire.admin.totens.table');
    }
}

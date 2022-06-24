<?php

namespace App\Http\Livewire\Admin\Products;

use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public function render()
    {
        return view('livewire.admin.products.edit');
    }
}

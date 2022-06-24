<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Products;
use Livewire\Component;

class Table extends Component
{
    public $products;

    protected $listeners = [
        'refreshTable' => 'getProducts',
    ];

    public function getProducts()
    {
        return $this->products = Products::get();
    }

    public function render()
    {
        $this->getProducts();

        return view('livewire.admin.products.table');
    }
}

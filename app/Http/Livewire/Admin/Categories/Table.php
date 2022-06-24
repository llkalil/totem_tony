<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Categories;
use Livewire\Component;

class Table extends Component
{
    public $categories;

    protected $listeners = [
        'refreshTable' => 'getCategories',
    ];

    public function getCategories()
    {
        return $this->categories = Categories::withCount('products')->get();
    }

    public function render()
    {
        $this->getCategories();
        return view('livewire.admin.categories.table');
    }
}

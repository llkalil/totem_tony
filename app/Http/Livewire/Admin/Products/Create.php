<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Categories;
use App\Models\Images;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;

class Create extends ModalComponent
{
    use WithFileUploads;

    public Products $product;
    public $image;
    public $categories;
    protected $rules = [
        'image'                 => 'image|required|max:1024',
        'product.name'          => 'required|string|min:6',
        'product.description'   => 'required|string|min:6',
        'product.categories_id' => 'required|integer',
        'product.price'         => 'required|integer',
        'product.market_price'  => 'required|integer',
    ];

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }

    public function mount()
    {
        $this->product = new Products();
    }

    public function save()
    {
        $this->validate();

        DB::transaction(function () {
            $path = $this->image->store('/images','public');

            $image_id = Images::create([
                'user_id'   => auth()->id(),
                'url'       => $path,
                'filename'  => $this->image->getFilename(),
                'mime_type' => $this->image->getMimeType(),
                'size'      => $this->image->getSize(),
            ])->id;

            $this->product->images_id = $image_id;
            $this->product->save();

            $this->emit('refreshTable');
            $this->closeModal();
            $this->dispatchBrowserEvent('banner-message', [
                'style'   => 'success',
                'message' => 'Produto criado com sucesso!',
            ]);
        });

    }

    /*
    'images_id',
    'name',
    'description',
    'categories_id',
    'price',
    'market_price',
    */

    public function render()
    {
        $this->getCategories();
        return view('livewire.admin.products.create');
    }

    private function getCategories(): void
    {
        $this->categories = Categories::where('active', true)->get();
    }
}

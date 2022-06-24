<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Categories;
use App\Models\Images;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    use withFileUploads;

    public $name, $image, $active;

    public $category_id;
    public $category;

    protected $rules = [
        'category.name'   => 'required|max:255',
        'category.active' => 'required|boolean',
        'image'           => 'image|nullable',
    ];

    public function updatedImage($value)
    {
        if ($value !== null) {
            $this->category->images_id = 'image';
        }else {
            $this->category->images_id = $this->category->getOriginal('images_id');
        }

    }

    public function mount()
    {
        if (null !== $this->category_id) {
            try {
                $this->category = Categories::findOrFail($this->category_id);
            } catch (ModelNotFoundException  $e) {
                $this->dispatchBrowserEvent('banner-message', [
                    'style'   => 'error',
                    'message' => 'Categoria não encontrada',
                ]);
            }
        }
    }

    public function save()
    {
        $this->validate();
        DB::transaction(function () {
            if ($this->image !== null) {
                $path = $this->image->store('/images', 'public');

                $this->category->images_id = Images::create([
                    'user_id'   => auth()->id(),
                    'url'       => $path,
                    'filename'  => $this->image->getFilename(),
                    'mime_type' => $this->image->getMimeType(),
                    'size'      => $this->image->getSize(),
                ])->id;
            }
            $this->category->save();
            $this->emit('refreshTable');
            $this->closeModal();
            $this->dispatchBrowserEvent('banner-message', [
                'style'   => 'success',
                'message' => 'Categoria editada com sucesso!',
            ]);
        });


    }

    public function render()
    {
        return view('livewire.admin.categories.edit');
    }
}

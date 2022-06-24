<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Categories;
use App\Models\Images;
use Illuminate\Support\Facades\DB;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    use WithFileUploads;

    public $name;
    public $image;
    public $rules = [
        'name' => 'required|max:255',
        'image' => 'image|max:1024',
    ];

    public function updated()
    {
        $this->validate();

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
            ]);
            Categories::create([
                'active'    => false,
                'name'      => $this->name,
                'images_id' => $image_id->id,
            ]);
        });
        $this->emit('refreshTable');
        $this->closeModal();
        $this->dispatchBrowserEvent('banner-message', [
            'style'   => 'success',
            'message' => 'Categoria criada com sucesso!',
        ]);

    }

    public function render()
    {

        return view('livewire.admin.categories.create');
    }
}

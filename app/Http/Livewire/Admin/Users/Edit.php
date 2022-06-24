<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Fortify\Rules\Password;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public User $user;

    public $user_id, $roles;

    public function mount()
    {
        if (null !== $this->user_id) {
            try {
                $this->user = User::findOrFail($this->user_id);
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

        $this->user->save();

        $this->emit('refreshTable');
        $this->closeModal();
        $this->dispatchBrowserEvent('banner-message', [
            'style'   => 'success',
            'message' => 'Usuário editado com sucesso!',
        ]);
    }

    public function render()
    {
        $this->roles = Roles::where('slug', '!=', 'totem')->get();
        return view('livewire.admin.users.edit');
    }

    protected function rules()
    {
        return [
            'user.name'     => ['nullable', 'string', 'max:255'],
            'user.roles_id'  => ['nullable', 'integer'],
            'user.email'    => ['nullable', 'string', 'email', 'max:255'],
        ];
    }
}

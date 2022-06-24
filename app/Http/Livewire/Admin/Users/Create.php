<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $user = [];
    public $roles;

    public function save()
    {
        $this->validate();

        User::create([
            'roles_id' => $this->user['role_id'],
            'name'     => $this->user['name'],
            'email'    => $this->user['email'],
            'password' => Hash::make($this->user['password']),
        ]);
        $this->emit('refreshTable');
        $this->closeModal();
        $this->dispatchBrowserEvent('banner-message', [
            'style'   => 'success',
            'message' => 'Usuário criado com sucesso!',
        ]);

    }

    public function render()
    {
        $this->roles = Roles::where('slug', '!=', 'totem')->get();
        return view('livewire.admin.users.create');
    }

    protected function rules()
    {
        return [
            'user.name'     => ['required', 'string', 'max:255'],
            'user.role_id'  => ['required', 'integer'],
            'user.email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'user.password' => ['required', 'string', new Password, 'confirmed'],
        ];
    }
}

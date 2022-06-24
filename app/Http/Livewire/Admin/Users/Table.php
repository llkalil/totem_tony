<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class Table extends Component
{
    public $users;

    protected $listeners = [
        'refreshTable' => 'getUsers',
    ];



    public function render()
    {
        $this->getUsers();
        return view('livewire.admin.users.table');
    }

    public function getUsers()
    {
        return $this->users = User::with('role')->where('id','!=',auth()->id())->get();
    }
}

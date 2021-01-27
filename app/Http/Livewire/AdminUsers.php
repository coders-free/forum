<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUsers extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {

        $users = User::where('name', 'LIKE', '%' . $this->search . '%')->paginate();

        return view('livewire.admin-users', compact('users'));
    }

    //Updating
    public function updatingSearch()
    {
        $this->resetPage();

    }
}

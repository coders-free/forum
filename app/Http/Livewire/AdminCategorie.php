<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategorie extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {

        $categories = Category::where('name', 'LIKE', '%' . $this->search . '%')
                        ->paginate();

        return view('livewire.admin-category', compact('categories'));
    }

    //Updating
    public function updatingSearch()
    {
        $this->resetPage();

    }
}

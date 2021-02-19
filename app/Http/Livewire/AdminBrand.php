<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBrand extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {

        $brands = Brand::where('name', 'LIKE', '%' . $this->search . '%')
                        ->paginate();

        return view('livewire.admin-brand', compact('brands'));
    }

    //Updating
    public function updatingSearch()
    {
        $this->resetPage();

    }
}

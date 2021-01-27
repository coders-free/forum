<?php

namespace App\Http\Livewire;

use App\Models\Voucher;
use Livewire\Component;
use Livewire\WithPagination;

class AdminVoucher extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {

        $vouchers = Voucher::where('title', 'LIKE', '%' . $this->search . '%')
                        ->paginate();

        return view('livewire.admin-voucher', compact('vouchers'));
    }

    //Updating
    public function updatingSearch()
    {
        $this->resetPage();

    }
}

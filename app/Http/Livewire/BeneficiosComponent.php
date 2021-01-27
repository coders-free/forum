<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Voucher;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Customer;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class BeneficiosComponent extends Component
{

    use WithPagination;

    public $search, $categories, $brands, $brand_id, $category_id;

    public $favorites;

    protected $queryString = [  'search'        => ['except' => ''],
                                'brand_id'      => ['except' => ''], 
                                'category_id'   => ['except' => '']
                            ];


    public function mount(){
        $this->categories = Category::all();
        $this->brands = Brand::all();
    }

    public function render()
    {

        if ($this->category_id) {
            
            $vouchers = Category::find($this->category_id)
                            ->vouchers()
                            ->where(function($query){
                                $query->whereHas('codes', function (Builder $query) {
                                    $query->where('customer_id', null);
                                })->orDoesntHave('codes');
                            })
                            ->whereDate('expiration_date', '>=', Carbon::now())
                            ->paginate(6);
      
        } elseif($this->favorites) {

            $vouchers = Customer::find(session('customer')->id)
                                ->vouchers()
                                ->whereDate('expiration_date', '>=', Carbon::now())
                                ->paginate(6);

        }else{
            
        
            $vouchers = Voucher::where(function($query){
                            $query->whereHas('codes', function (Builder $query) {
                                $query->where('customer_id', null);
                            })->orDoesntHave('codes');
                        })
                        ->where('title', 'LIKE', '%' . $this->search . '%')
                        ->whereDate('expiration_date', '>=', Carbon::now())
                        ->brand($this->brand_id)
                        ->paginate(6);
        }

        return view('livewire.beneficios-component', compact('vouchers'))->layout('layouts.forum');
    }


    public function favorites(Voucher $voucher){
        if ($voucher->check) {
            $voucher->customers()->detach(session('customer')->id);
        }else{
            $voucher->customers()->attach(session('customer')->id);
        }
    }


    //Updating
    public function updatingSearch()
    {
        $this->resetPage();

        $this->reset(['brand_id', 'category_id', 'favorites']);
    }

    public function updatingBrandId()
    {
        $this->resetPage();
        $this->reset(['search', 'category_id', 'favorites']);
    }

    public function updatingCategoryId()
    {
        $this->resetPage();
        $this->reset(['search', 'brand_id', 'favorites']);
    }

    public function updatingFavorites()
    {
        $this->resetPage();
        $this->reset(['search', 'brand_id', 'category_id']);
    }
}

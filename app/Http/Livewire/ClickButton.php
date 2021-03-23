<?php

namespace App\Http\Livewire;

use App\Models\Voucher;
use App\Models\VoucherTrack;
use Carbon\Carbon;
use Livewire\Component;

class ClickButton extends Component
{

    public $voucher;

    public function mount(Voucher $voucher){
        $this->voucher = $voucher;
    }


    public function render()
    {
        return view('livewire.click-button');
    }

    public function clicLlamar(){
        VoucherTrack::create([
            'id_cliente'    => session('customer')->id_cliente,
            'rut'           =>  session('customer')->rut,
            'accion'        => 'CLIC',
            'modulo'        => 'LLAMAR',
            'fecha_track'   => Carbon::now()->format('d-m-Y')
        ]);
    }

    public function clicBoton(){
        VoucherTrack::create([
            'id_cliente'    => session('customer')->id_cliente,
            'rut'           =>  session('customer')->rut,
            'accion'        => 'CLIC',
            'modulo'        => strtoupper($this->voucher->text_button),
            'fecha_track'   => Carbon::now()->format('d-m-Y')
        ]);
    }   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Models\VoucherTrack;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\CodeExchanged;
use App\Models\CuponAsignado;

class VoucherController extends Controller
{
    public function show(Voucher $voucher){

        VoucherTrack::create([
            'id_cliente'    => session('customer')->id_cliente,
            'rut'           =>  session('customer')->rut,
            'accion'        => 'OPEN',
            'modulo'        => 'BENEFICIOS',
            'fecha_track'   => Carbon::now()->format('d-m-Y')
        ]);

        return view('vouchers.show', compact('voucher'));
    }

    public function exchange(Voucher $voucher){

        foreach ($voucher->codes as $code) {
            if(!$code->customer_id){
                $code->update([
                    'customer_id' => session('customer')->id
                ]);

                CuponAsignado::create([
                    'marca_beneficio'   => $voucher->brand->name,
                    'codigo_cupon'      => $code->value,
                    'id_cliente'        => session('customer')->id_cliente,
                    'rut'               => session('customer')->rut,
                    'fecha_asignacion'  => Carbon::now()->format('d-m-Y')
                ]);

                VoucherTrack::create([
                    'id_cliente'    => session('customer')->id_cliente,
                    'rut'           =>  session('customer')->rut,
                    'accion'        => 'OPEN',
                    'modulo'        => 'CUPON',
                    'observacion'   => 'CANJE DE CUPON',
                    'fecha_track'   => Carbon::now()->format('d-m-Y')
                ]);

                $mail = new CodeExchanged($code);
                Mail::to(session('customer')->email)->send($mail);

                return redirect()->route('vouchers.show', $voucher)->with('info', 'El código se envío a su correo electrónico');

            }elseif ($code->customer_id == session('customer')->id) {
                $mail = new CodeExchanged($code);
                Mail::to(session('customer')->email)->send($mail);

                return redirect()->route('vouchers.show', $voucher)->with('info', 'El código se envío a su correo electrónico');
            }
            
        }
    }
}

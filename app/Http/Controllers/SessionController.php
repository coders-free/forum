<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\VoucherTrack;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(){
        return view('session.index');
    }

    public function store(Request $request){
        if(Customer::where('rut', $request->rut)->count()){
            $customer = Customer::where('rut', $request->rut)->first();

            session(['customer' => $customer]);

            VoucherTrack::create([
                'id_cliente'    => $customer->id_cliente,
                'rut'           =>  $customer->rut,
                'accion'        => 'OPEN',
                'modulo'        => 'INICIO_SESION',
                'fecha_track'   => Carbon::now()->format('d-m-Y')
            ]);

            return redirect('/');
        }

        return back()->with('info', 'RUT no registrado en la bbdd');
    }

    public function logout(){
        session()->forget('customer');
        return redirect('/');
    }
}

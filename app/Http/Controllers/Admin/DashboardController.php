<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\CuponAsignado;
use App\Models\VoucherTrack;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

use PhpParser\Node\Expr\FuncCall;

class DashboardController extends Controller
{

    public function dashboard(){

        $codes = Code::whereDate('created_at', '=', Carbon::now())->count(); 
        $cupones_asignados = CuponAsignado::whereDate('created_at', Carbon::now())->count();
        $inicios_de_sesion = VoucherTrack::where('modulo', 'INICIO_SESION')->whereDate('created_at', Carbon::now())->count();
        $beneficios_open = VoucherTrack::where('modulo', 'BENEFICIOS')->whereDate('created_at', Carbon::now())->count();
        //return $cupones_asignados;
        return view('dashboard', compact('codes', 'cupones_asignados', 'inicios_de_sesion', 'beneficios_open'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index(){
        return view('contacto.index');
    }

    public function store(Request $request){
        $correo = new ContactoMailable($request->all());
        Mail::to('beneficios@kmsforum.cl')->send($correo);

        return redirect()->route('contacto.index')->with('info', 'Su consulta ha sido enviada con exito.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Voucher;

class VoucherController extends Controller
{

    public function edit(Voucher $voucher)
    {

        $brands = Brand::pluck('name', 'id');

        return view('admin.vouchers.edit', compact('voucher', 'brands'));
    }

   
    public function update(Request $request, Voucher $voucher)
    {

        $request->validate([
            'file' => 'image',
            'description' => 'required',
            'description2' => 'required',
            'brand_id' => 'required',
            'text_button' => 'required',
        ]);


        $data = $request->all();

        if ($request->file('file')) {
            $url = Storage::put('vouchers', $request->file('file'));

            $data['image'] = Storage::url($url);

        }


        $voucher->update($data);
        return back()->with('info', 'El beneficio se actualizó con éxito');
    }

   
    public function destroy(Voucher $voucher)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use PhpParser\Node\Expr\FuncCall;

class BrandController extends Controller
{

    public function create(){

        $categories = Category::pluck('name', 'id');
        return view('admin.brands.create', compact('categories'));
    }

    public function store(Request $request){
       
        $request->validate([
            'name' => 'required'
         ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->category_id = $request->category_id;
        $brand->save();
        return redirect()->route('admin.brand.index')->with('info', 'La Marca se guardo con éxito');
    }
    
    public function edit(Brand $brand)
    {

        $categories = Category::pluck('name', 'id');
        return view('admin.brands.edit', compact('brand', 'categories'));
    }

   
    public function update(Request $request, Brand $brand)
    {

        $request->validate([
           'name' => 'required'
        ]);


        $brand->name = $request->name;
        //var_dump($category->id);


        $brand->save();
        return back()->with('info', 'La Marca se actualizó con éxito');
    }

   
    public function destroy(Brand $brand)
    {
        
        $brand->delete();
        return redirect()->route('admin.brand.index')->with('info', 'La Marca se elimino con éxito');
    }
}

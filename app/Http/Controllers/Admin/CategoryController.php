<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;
use PhpParser\Node\Expr\FuncCall;

class CategoryController extends Controller
{

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
       
        $request->validate([
            'name' => 'required'
         ]);

        $category = new Category();
        $category->name = $request->name;
        $category->active = 1;
        $category->save();
        return redirect()->route('admin.category.index')->with('info', 'La Categoría se guardo con éxito');
    }
    
    public function edit(Category $category)
    {

        return view('admin.categories.edit', compact('category'));
    }

   
    public function update(Request $request, Category $category)
    {

        $request->validate([
           'name' => 'required'
        ]);


        $category->name = $request->name;
        //var_dump($category->id);


        $category->save();
        return back()->with('info', 'La Categoría se actualizó con éxito');
    }

   
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('info', 'La Categoría se elimino con éxito');
    }
}

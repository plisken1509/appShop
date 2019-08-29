<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $categorias = Category::where("activo", "SI")->paginate(15);
        
        return view('admin.categories.index')->with(compact('categorias'));
        
    }
     
    public function create()
    {
        return view('admin.categories.create');//formulario de registro		
    }
    public function store(Request $request)//registrar nuevo categoria
    {
        /*dd($request->all());*/
        //reglas validaciones
        $msg=[
            'name.required'=>'El nombre es obligatorio',
            'name.min'=>'El nombre tiene un mínimo de 5 caracteres',
            'description.min'=>'La descripción tiene un mínimo de 5 caracteres',
            'description.max'=>'La descripción tiene un máximo de 250 caracteres',
        ];
        $rules=[
            'name'=>'required',
            'name'=>'required|min:5',
            'description'=>'required|min:5',
            'description'=>'required|max:250'
        ];
        $this->validate($request,$rules,$msg);
        Category::create($request->all());//asignamiento masivo
        return redirect('/admin/categories');
    }
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with(compact('category'));//formulario de registro      
    }
    public function update(Request $request, Category $category)
    {
        $messages=[
            'name.required'=>'El nombre es obligatorio',
            'name.min'=>'El nombre tiene un mínimo de 5 caracteres',
            'description.min'=>'La descripción tiene un mínimo de 5 caracteres',
            'description.max'=>'La descripción tiene un máximo de 250 caracteres',
        ];
        $rules=[
            'name'=>'required',
            'name'=>'required|min:5',
            'description'=>'required|min:5',
            'description'=>'required|max:250'
        ];
        $this->validate($request,$rules,$messages);
        $category->update($request->all());//update
        return redirect('/admin/categories');      
    }
     public function destroy($id)
    {
        //Eliminacion de Productos metodo Fisico
        /*$producto = Product::find($id);
        $producto->delete();   
        return back();*/

        //Eliminacion de Productos metodo logico
        $categoria = Category::where('id', $id)->update(["activo" => 'NO']);
        return back()->with('alert', 'Deleted!');
    }
}

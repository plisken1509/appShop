<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
		$productos = Product::paginate(15);
        return view('admin.products.index')->with(compact('productos'));//listado
        
    }
    public function create()
    {
        return view('admin.products.create');//formulario de registro		
    }
    public function store(Request $request)//registrar nuevo producto
    {
        /*dd($request->all());*/
        $producto = new Product();
        $producto->name=$request->input('name');
        $producto->description=$request->input('description');
        $producto->price=$request->input('price');
        $producto->long_description=$request->input('long_description');
        $producto->save();
        return redirect('/admin/productos');
    }
    public function edit($id)
    {
        $producto = Product::find($id);
        return view('admin.products.edit')->with(compact('producto'));//formulario de registro      
    }
    public function update(Request $request, $id)
    {
        $producto = Product::find($id);
        $producto->name=$request->input('name');
        $producto->description=$request->input('description');
        $producto->price=$request->input('price');
        $producto->long_description=$request->input('long_description');
        $producto->save();//update
        return redirect('/admin/productos');      
    }
     public function destroy($id)
    {
        $producto = Product::find($id);
        $producto->delete();   
        return back();
    }
}

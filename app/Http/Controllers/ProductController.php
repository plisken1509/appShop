<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
		/*$productos = Product::paginate(15);
        return view('admin.products.index')->with(compact('productos'));//listado*/

        $productos = Product::where("activo", "SI")->paginate(15);
        
        return view('admin.products.index')->with(compact('productos'));
        
    }
    public function create()
    {
        return view('admin.products.create');//formulario de registro		
    }
    public function store(Request $request)//registrar nuevo producto
    {
        /*dd($request->all());*/
        //reglas validaciones
        $messages=[
            'name.required'=>'El nombre es obligatorio',
            'description.required'=>'La descripción es obligatoria',
            'description.max'=>'La descripción tiene un máximo de 200 caracteres',
            'price.required'=>'El precio es obligatorio',
            'price.numerico'=>'Ingrese un precio valido',
            'price.min'=>'No se admite valores negativos',
        ];
        $rules=[
            'name'=>'required',
            'description'=>'required|max:200',
            'price'=>'required|numeric|min:0'
        ];
        $this->validate($request,$rules,$messages);
        $producto = new Product();
        $producto->name=$request->input('name');
        $producto->description=$request->input('description');
        $producto->price=$request->input('price');
        $producto->long_description=$request->input('long_description');
        $producto->activo=$request->input('activo');
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
        $messages=[
            'name.required'=>'El nombre es obligatorio',
            'description.required'=>'La descripción es obligatoria',
            'description.max'=>'La descripción tiene un máximo de 200 caracteres',
            'price.required'=>'El precio es obligatorio',
            'price.numerico'=>'Ingrese un precio valido',
            'price.min'=>'No se admite valores negativos',
        ];
        $rules=[
            'name'=>'required',
            'description'=>'required|max:200',
            'price'=>'required|numeric|min:0'
        ];
        $this->validate($request,$rules,$messages);
        $producto = Product::find($id);
        $producto->name=$request->input('name');
        $producto->description=$request->input('description');
        $producto->price=$request->input('price');
        $producto->long_description=$request->input('long_description');
        $producto->activo=$request->input('activo');
        $producto->save();//update
        return redirect('/admin/productos');      
    }
     public function destroy($id)
    {
        //Eliminacion de Productos metodo Fisico
        /*$producto = Product::find($id);
        $producto->delete();   
        return back();*/

        //Eliminacion de Productos metodo logico
        $producto = Product::where('id', $id)->update(["activo" => 'NO']);
        return back()->with('alert', 'Deleted!');
    }
}

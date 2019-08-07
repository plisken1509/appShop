<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
     public function index($id)
    {
    	 $product = Product::find($id);
    	$images = $product->images()->orderBy('featured', 'desc')->get();
    	return view('admin.products.imagenes.index')->with(compact('product', 'images'));
    }
     public function store(Request $request, $id)//registrar nuevo imagenes
    {
        /*dd($request->all());*/
       //guardar imagen en el proyecto
       $file=$request->file('photo');
       $path=public_path() . '/images/products/';
       $fileName=uniqid() . $file->getClientOriginalName();
       $file->move($path, $fileName);

       //crear 1 registro en la tabla product_images
       $productImage = new ProductImage();
       $productImage->image=$fileName;

       //$productImage->featured=;
       $productImage->product_id = $id;
       $productImage->save();
       return back();
    }
}

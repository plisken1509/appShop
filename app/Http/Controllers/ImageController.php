<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use File;
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
       $fileName = uniqid() . $file->getClientOriginalName();
       $moved=$file->move($path, $fileName);

       //crear 1 registro en la tabla product_images
       if($moved){
          $productImage = new ProductImage();
          $productImage->image=$fileName;

           //$productImage->featured=;
          $productImage->product_id = $id;
          $productImage->save();
       }
       
       return back();
    }
    public function destroy(Request $request,$id)//registrar nuevo imagenes
    {
      /*return dd($request->all());*/
        //eliminar el archivo
        $productImage= ProductImage::find($request->input('image_id'));
        if  (substr($productImage->image, 0, 4) === "http"){
          $deleted=true;
        }else{
          $fullPath=public_path().'/images/products/'.$productImage->image;
          $deleted=File::delete($fullPath);
        }
      //eliminar de la base de datos la img
        if ($deleted) {
          $productImage->delete();
        }
        return back();
    }
}

<?php

namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
	public function welcome(){
		$productos = Product::all();
    	return view('welcome')->with(compact('productos'));
		/*$productos=Product::all();
		return view('welcome')->with(compact('productos'));*/
	}
	
}

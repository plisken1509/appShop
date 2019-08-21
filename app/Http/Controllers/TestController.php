<?php

namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
	public function welcome(){
		$productos = Product::paginate(9);
    	return view('welcome')->with(compact('productos'));
		/*$productos=Product::all();
		return view('welcome')->with(compact('productos'));*/
	}
	public function store(){
		request()->validate([
			'name' => 'required',
			'email' => 'required|email',
			'subject' => 'required',	
			'content' => 'required|min:10|max:200'
		]);
		return "Datos Validados";
	}
	
}

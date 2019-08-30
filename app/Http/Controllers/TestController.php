<?php

namespace App\Http\Controllers;


use App\Category;
use App\Mail\MessageReceived;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
	public function welcome(){
		$categories = Category::where("activo", "SI")->has('products')->get();
    	return view('welcome')->with(compact('categories'));
		/*$productos=Product::all();
		return view('welcome')->with(compact('productos'));*/
	}
	public function store(){
		$message=request()->validate([
			'name' => 'required',
			'email' => 'required|email',
			'subject' => 'required',	
			'content' => 'required|min:10|max:200'
		]);
		Mail::to('solorzanopablo81@gmail.com')->queue(new MessageReceived($message));
		return "Mensaje enviado";
	}
	
}

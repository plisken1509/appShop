<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
	public function welcome(){
		$a=5;
		$b=23;
		$c=$a+$b;
		return "La suma es: $c";
	}
	
}

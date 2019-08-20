<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update(Request $request)
	{
		$cart=auth()->user()->cart;
		$cart->status = 'Pending';
		$cart->save();
		$notification="Tu pedido se ha registrado correctamente. Te contactaremos pronto.";
		return back()->with(compact('notification'));
	}
}

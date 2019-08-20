<?php

namespace App\Http\Controllers;

use App\CartDetail;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
	public function store(Request $request)
	{
		$cart = auth()->user()->cart;
		$detail=$cart->details()->where('product_id', $request->product_id)->first();
		if($detail){
			$detail->quantity += $request->quantity;
			$detail->save();
		}else{
			$cartDetail = new CartDetail();
			$cartDetail->cart_id =auth()->user()->cart->id;
			$cartDetail->product_id = $request->product_id;
			$cartDetail->quantity = $request->quantity;
			$cartDetail->save();
		}
		$notification="El producto se agrego correctamente al carrito de compras!";
		return back()->with(compact('notification'));
	}
	public function destroy(Request $request)
	{

		$cartDetail = CartDetail::find($request->cart_detail_id);
		if ($cartDetail->cart_id == auth()->user()->cart->id)
			$cartDetail->delete();
		$notification='El producto se ha eliminado del carrito de compras correctamente.';
		return back()->with(compact('notification'));
	}
}

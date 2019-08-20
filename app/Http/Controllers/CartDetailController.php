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
		return back();
	}
	public function destroy(Request $request)
	{

		$cartDetail = CartDetail::find($request->cart_detail_id);
		if ($cartDetail->cart_id == auth()->user()->cart->id)
			$cartDetail->delete();

		return back();
	}
}

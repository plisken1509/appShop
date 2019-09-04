<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;

class CartController extends Controller
{
    public function update(Request $request)
	{
		$client = auth()->user();
		$cart=$client->cart;
		$cart->status = 'Pending';
		$cart->order_date=Carbon::now();
		$cart->save();
		$admins = User::where('admin',true)->get();
		Mail::to($admins)->queue(new NewOrder($client, $cart));

		$notification="Tu pedido se ha registrado correctamente. Te contactaremos pronto.";
		return back()->with(compact('notification'));
	}
}

<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkOutIndex()
    {
        if(!Session::has('cart')){
            return view('shop/shoppingCart');
        }else{
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);

            if($cart->totalQty == 0){
                $total = 0;
            }else{
                $total = $cart->totalPrice;
            }

            return view('shop/checkOut', ['total' => $total]);
        }
    }

    public function postCheckOut(Request $request)
    {
        if(!Session::has('cart')){
            return redirect()->route('productHome');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order();
        $order->cart = serialize($cart);
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        $order->paymentId = rand();

        auth()->guard('customer')->user()->orders()->save($order);

        Session::forget('cart');
        return view('shop/successfulMessage', ['successful' => 'completed purchase']);
    }
}
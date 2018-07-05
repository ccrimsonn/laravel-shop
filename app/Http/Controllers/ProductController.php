<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function getIndex(){
        $products = Product::all();
        return view('shop.index', ['products' => $products]);
    }

    public function addToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
//        dd($request->session()->get('cart'));
        return redirect()->route('productHome');
    }

    public function reduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }

        return redirect()->route('shoppingCart');
    }

    public function removeItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }

        return redirect()->route('shoppingCart');
    }

    public function showCart(){
        if(!Session::has('cart')){

            return view('shop/shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        if($cart->totalQty == 0){
            $cart->totalPrice = 0;
        }

        return view('shop/shoppingCart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
}

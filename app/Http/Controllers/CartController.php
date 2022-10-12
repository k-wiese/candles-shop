<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function store(Request $request){
        $product = Product::findOrFail($request->input('product_id'));
        Cart::add(
            $product->id, 
            $product->name, 
            $request->input('quantity'), 
            $product->price, 
            );
        
        return redirect()->route('shop.index')->with('message','Successfully added to cart!');
    }

    public function index()
    {
        $cart = Cart::content();
        $cart_price = 0;
        $cart_quantity = 0;
        foreach ($cart as $item)
        {
            $cart_price += $item->price;
            $cart_quantity += $item->qty;
        }
        $products = Product::get();
        return view('cart.index',['cart'=>$cart,'cart_price'=>$cart_price,'cart_quantity'=>$cart_quantity,'products'=>$products]);
    }
    public function destroy($rowid)
    {
        Cart::remove($rowid);
        $cart = Cart::content();
        $cart_price = 0;
        $cart_quantity = 0;
        foreach ($cart as $item)
        {
            $cart_price += $item->price;
            $cart_quantity += $item->qty;
        }
        return view('cart.index',['cart'=>$cart,'cart_price'=>$cart_price,'cart_quantity'=>$cart_quantity]);
    }
}

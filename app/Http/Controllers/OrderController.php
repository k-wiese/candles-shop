<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BoughtProducts;
use Gloudemans\Shoppingcart\Facades\Cart;



class OrderController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $requestData = $request->all();
            $requestData['user_id'] = Auth::user()->id;
            $order = Order::create($requestData);
            return view('shop.payment',['order'=>$order->id]);
        }
        else
        {
            return view('login');
        }
    }
    public function update(Request $request,$id){

        $requestData = $request->all();
        if($requestData['user_paid'])
        {
            $order = Order::findOrFail($id);


            $cart = Cart::content();
            $cart_price = 0;

            foreach ($cart as $item)
            {
                $cart_price += $item->price;
            }
            if($order->price == floor(($cart_price)*1.21))
            {
                $order->paid = true;
                foreach($cart as $item)
                {
                    BoughtProducts::create([
                        'name'=> $item->name,
                        'price'=> $item->price,
                        'qty'=> $item->qty,
                        'product_id'=> $item->id,
                        'order_id'=> $order->id,
                    ]);
                }
                Cart::destroy();
                $order->save();
                return redirect()->route('shop.index')->with('message','Payment successfull, you can check your order in dashboard.');

            }
            else
            {
                
                return view('home');
            }
    
        }
        else
        {
            return redirect()->route('shop.index')->with('message','Payment unsuccessfull! Something went wrong. If you think this is our fault contact our support, check "Account" for order details.');
            
        }
       
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role !== 'user')
        {
            return view('shop.create');
        }
        else
        {
            return view('shop.index');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $fileName = time().$request->file('photo')->getClientOriginalName();

        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $sq_path = $request->file('photo')->storeAs('images', 'sq_'.$fileName, 'public');

        $requestData['photo'] = 'storage/'.$path;
        $requestData['photo_sq'] = 'storage/'.$sq_path;
   
        
        $img_sq = Image::make($request->file('photo')->getRealPath());
        $img_sq->resize(280,340);
        $img_sq->save('storage/'.$sq_path);

        
        $img = Image::make($request->file('photo')->getRealPath());
        
        $img->resize(1200,1400);
        $img->save('storage/'.$path);
        Product::create($requestData);
        return view('shop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $cart = Cart::content();
        return view('shop.show',['product'=>$product,'cart'=>$cart]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role !== 'user')
        {
            return view('shop.edit',['id'=>$id]);
        }
        else
        {
            return view('shop.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $requestData = $request->all();
        if(isset($requestData['photo']))
        {
            $fileName = time().$request->file('photo')->getClientOriginalName();

        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $sq_path = $request->file('photo')->storeAs('images', 'sq_'.$fileName, 'public');

        $product->photo = 'storage/'.$path;
        $product->photo_sq = 'storage/'.$sq_path;
   
        
        $img_sq = Image::make($request->file('photo')->getRealPath());
        $img_sq->fit(200);
        $img_sq->save('storage/'.$sq_path);

        
        $img = Image::make($request->file('photo')->getRealPath());
        
        $img->fit(450);
        $img->save('storage/'.$path);
        }
        
        
        if(isset($requestData['name']))
        {
            $product->name = $requestData['name'];
        }
        if(isset($requestData['price']))
        {
            $product->price = $requestData['price'];
        }
        if(isset($requestData['stripe_price']))
        {
            $product->stripe_price = $requestData['stripe_price'];
        }
        if(isset($requestData['color']))
        {
            $product->color = $requestData['color'];
        }
        if(isset($requestData['description']))
        {
            $product->description = $requestData['description'];
        }
        $product->save();
        return view('shop.index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return view('shop.index');
    }
  
}

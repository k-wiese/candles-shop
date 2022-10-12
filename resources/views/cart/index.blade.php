@extends('layout.main')

@section('content')

<div class="container p-3 my-5">
    <div class="row m-1 justify-content-center">
        <div class="col-sm-8 text-center">

            @if(Cart::total() > 0)
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th  scope="col">Price</th>
                    <th  scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody >
                    @foreach($cart as $item)
                    <tr >
                        <th scope="row">{{  $item->id   }}</th>
                        <td >
                            <div>
                                <img src="{{   asset(($products->find($item->id))->photo)  }}" class="img img-fluid img-cart rounded-circle rounded" alt="">
                            </div>
                        </td>
                        <td >{{   $item->name   }}</td>
                        <td>{{   $item->qty   }}</td>
                        <td>{{   $item->price   }}.00$</td>
                        <td>
                            <form method="post" action="{{  route('cart.destroy',$item->rowId)  }}">
                                @csrf
                                @method('post')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr >
                        <th scope="row"></th>
                        <td ></td>
                        <td >Together:</td>
                        <td>{{   $cart_quantity   }} pcs.</td>
                        <td>{{   floor($cart_price*1.21)   }}.00$</td>
                        <td> with TAX</td>
                        <td> </td>
                    </tr>
                </tbody>
              </table>
              @endif
              @if(Auth::check() and Cart::total() > 0)
                <div class="p-3">
                    <form method="post" action="{{  route('order.store')  }}">
                        @csrf
                        <input type="hidden" name="price" value="{{   floor($cart_price*1.21)   }}">

                        <button class="btn btn-outline-info" type="submit">Order</button>
                    </form>
                </div>
              @else
              <div class="p-3">
                <p class="fs-3">Log in or add something to Cart</p>

                    <button class="btn btn-outline-info disabled"type="submit"> Order</button>

              </div>
              @endif
              
        </div>
    </div>
</div>

@endsection

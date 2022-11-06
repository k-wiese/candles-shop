@extends('layout.main')

@section('content')

<div class="container">
    <div class="row justify-content-center p-5">
        <div class="col-md-8  text-center p-5">
            <div class=" p-4">

                <div>
                    <img src="{{    asset($product->photo)  }}"  class="img img-fluid show-img" alt="">
                </div>
                <h1 class="pt-4 pb-2">{{    $product->name  }}</h1>
                <p class="fs-6"> <del>{{    floor(($product->price) * 1.3)  }}.00$</del></p>
                <p class="fs-4"> <b>{{    $product->price  }}.00$</b></p>
                <p>{{$product->description}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio animi ratione, fugit eligendi harum voluptates unde expedita in repellendus provident voluptate consequuntur molestias at. Pariatur sit placeat inventore! Delectus, necessitatibus.</p>
                <div class="p-3">
                    @if($cart->where('id',$product->id)->count())
                        In cart
                    @else
                    <form action=" {{route('cart.store')}} " method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <label for="Quantity"> <p>Quantity</p> 

                            <input type="number" id="quantity" class="form-control" value="1" min="1" name="quantity"> 
                        </label>
                        <div class="p-3">

                            <button type="submit" class="btn btn-outline-info">Add to cart</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

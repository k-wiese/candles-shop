<div >
    <div class="container" >
        <div class="row justify-content-center mt-4">

            <div class="col-md-2 px-5 text-center">
                <label for=""> Sort By
                    <select wire:model="sortBy" class="form-select " aria-label="Default select example">

                        <option selected class="text-dark" >No Filter</option>
                        <option class="text-dark" value="color">Color</option>
                        <option class="text-dark" value="price">Price</option>
                    </select>
                </label>
            </div>
            <div class="col-md-2 px-5 text-center">
                <label for=""> Order By
                    <select wire:model="descending" class="form-select" aria-label="Default select example">
                        <option selected class="text-dark" value="{{false}}">Ascending</option>
                        <option class="text-dark" value="{{true}}">Descending</option>
                    </select>
                </label>
            </div>
        </div>

        <div class="row justify-content-center">
            @if(Auth::check() and Auth::user()->role === 'admin')
                <div class="text-center p-5">

                    <a href="{{   route('shop.create')  }}">
                        <button class="btn btn-light">Add new product</button>
                    </a>
                </div>
            @endif

            @foreach($products as $product)
           
            <div class="col-md-3 p-3 text-center ">
                @if(Auth::check() and Auth::user()->role === 'admin')
                <div class="p-2">
                    <div class="row">
                        <div class=" col-6 p-2">

                            <form action="{{route('shop.edit',['shop'=>$product->id])}}">
                            @csrf
                            <button class="btn btn-sm btn-light">Edit</button>
                            </form>
                        </div>
                        
                        <div class="col-6 p-2">

                            <form action="{{route('shop.destroy',['shop'=>$product->id])}}" method="post" onclick="alert('Are you sure?')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>

                    </div>
                </div>
                @endif


                    <div class="">
                        <div class="p-3">
                        <img src="{{  asset($product->photo_sq)   }}" class=" rounded-5 img img-fluid  index-img" alt="">
                        </div>
                        <h4 class="p-2 ">{{    $product->name  }}</h4>
                        <p class="">{{    $product->price  }}.00$</p>
                        <div class="pt-2 pb-4">
                            <a href="{{ route('shop.show',['shop'=>$product->id]) }}">
                                <button class="btn btn-outline-info">Check details</button>
                            </a>
                        </div>
                    </div>

              
            </div>

            @endforeach
            
        </div>
    </div>
</div>

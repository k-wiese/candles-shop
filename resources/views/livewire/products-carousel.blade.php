<div class="row">
    <div class="col-sm-12">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner px-md-5" >

            @foreach ($slides as $products)

                <div  class="carousel-item px-md-5
                    <?php
                        if ($products === $slides->first()) {
                            echo 'active';
                        }
                    ?>">

                    <div class="row px-md-5">    
                        @foreach($products as $product)
                            <div class="col-md-3 p-4 text-center">
                                <div class="p-3">
                                    <img src="{{  asset($product->photo_sq)   }}" class=" rounded-5 img img-fluid  index-img" alt="">
                                </div>
                                <h4 class="p-2 ">{{    $product->name  }}</h4>
                                <p class="">{{    $product->price  }}.00$</p>
                                <div class="pt-2 pb-4">
                                    <a href="{{ route('shop.show',['shop'=>$product->id]) }}">
                                        <button class="btn btn-info">Check details</button>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                </div>

            @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
</div>

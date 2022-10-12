<div class="" >
    <header class="p-3 text-bg-dark">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
              <img src="{{ asset('img/logo.png') }}" height="40px" alt="">
              <span class="fs-4 mt-1">Candles <bdi class="text-info"> and Art</bdi></span>
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 p-3">
              <li><a href="{{  url('/') }}" class="nav-link px-2 text-white fs-5">Home</a></li>
              <li><a href="{{  url('/shop') }}" class="nav-link px-2 text-white fs-5">Shop</a></li>
              <li><a href="{{  url('/contact') }}" class="nav-link px-2 text-white fs-5">Contact</a></li>
            </ul>
            <div>
              <div class="px-4 text-center text-info">
                  {{  \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }}
                <div>
                <a href="{{  route('cart.index') }}">
                <img class="img img-fluid img-cart-icon" src="{{ asset('img/carticon2.png') }}" alt="">
                </a>
              </div>
              </div>
            </div>
    
         

            @if(Auth::check())
            <div class="text-center mt-2">
              <div class="ms-1 p-1 text-center">

                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-outline-danger px-2 me-2">Logout</button>
                </form>
              </div>

              <div class="p-1 text-center">
                <a href="{{ route('dashboard') }}">
                  <button class="btn btn-outline-info btn-sm px-2">Account</button>
                </a>
              </div>

            </div>
            @else
            <div class="text-end">
              <div class="row">
                
                <div class="col-sm-5">

                  <a href="{{ route('login') }}">
                    <button type="button" class="btn btn-outline-light me-2 ">Login</button>
                  </a>
                </div>
                <div class="col-sm-7">
  
                  <a href="{{ route('register') }}">
                    <button type="button" href="{{ route('register') }}"class="btn btn-outline-info">Sign-up</button>
                  </a>
                </div>
              </div>
            </div>
            @endif

          </div>

        </div>
      </header>
  </div>
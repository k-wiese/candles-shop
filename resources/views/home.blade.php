@extends('layout.main')
@section('title')Home @endsection

@section('content')


<div class="container-fluid my-5">
    <div class="text-center p-3 mt-4">

        <h1 class="text-info"> <b>Handmade</b>  with love!</h1>
    </div>
    
    @livewire('products-carousel')
</div>
<div class="container px-5 my-5">

    <div class="row py-3">


           <div class="col-lg-5 text-center">
               <img src="{{ asset('img/5.jpg') }}" class="img img-fluid index-img-bio rounded-5 " alt="">
           </div>
           <div class="col-lg-7 py-5 text-start">
               <h2 class="text-info pb-3"><b>About</b> the business</h2>
               <p class="p-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse atque laboriosam quam sint nesciunt placeat dignissimos cumque mollitia voluptatibus adipisci nihil facere eaque, temporibus debitis, quidem eveniet architecto neque illum.</p>
               <p class="p-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse atque laboriosam quam sint nesciunt placeat dignissimos cumque mollitia voluptatibus adipisci nihil facere eaque, temporibus debitis, quidem eveniet architecto neque illum.</p>
           </div>

    </div>
</div>

@endsection

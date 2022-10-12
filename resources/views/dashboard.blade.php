@extends('layout.main')


@section('content')

<div class="container">

    <div class="row justify-content-center my-5">
        <div class="col-sm-8 text-center p-4">
            <h1>Hello, {{Auth::user()->name}}</h1>
        </div>
    </div>
    @if(!($orders->isEmpty()))
    <div class="row justify-content-center">
        <div class="col-sm-8 text-center p-4">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Is paid?</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)
                  <tr>
                    <th scope="row">{{  $order->id }}</th>
                    <td>{{$order->price}}</td>
                    @if($order->paid)
                    <td>Yes</td>
                    @else
                    <td>
                       No
                    </td>
                    @endif
                  </tr>
                @endforeach

                </tbody>
              </table>
        </div>
    </div>
    @else
        <div class="text-center">

            <h3>No orders yet</h3>
            <div class="p-3">
                <a href="{{ route('shop.index') }}">
                    <button class="btn btn-outline-info">Go to shop</button>
                </a>
            </div>
            
        </div>
    @endif
</div>

@endsection

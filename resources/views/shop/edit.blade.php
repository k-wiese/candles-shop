@extends('layout.main')


@section('content')

<div class="container ">
    <div class="text-center p-3">
        <h2>Edit product</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-5 text-center border border-dark border-2">
            <form action="{{  route('shop.update',['shop'=>$id])  }}" enctype="multipart/form-data" method="post">
                @method('patch')
                @csrf
                <div class="p-2">

                    <label for="name">Name <br>
                    <input class="form-control text-dark" type="text" name="name" id="name" >
                    </label>
                    <br>
                </div>
                <div class="p-2">

                    <label for="description">Description <br>
                    <input class="form-control text-dark" type="textarea" name="description" id="description" >
                    </label>
                    <br>
                </div>
                <div class="p-2">

                    <label for="stripe_price">Stripe price link <br>
                    <input class="form-control text-dark" type="text" name="stripe_price" id="stripe_price" >
                    </label>
                    <br>
                </div>
                <div class="p-2">

                    <label for="price">Price <br>
                        <input class="form-control text-dark" type="number" name="price" id="price" >
                    </label>
                    <br>
                </div>
                <div class="p-2">
                    <label for="">Color
                    <select name="color" class="form-select" aria-label="Default select example">
                        <option class="text-dark" value="black">Black</option>
                        <option class="text-dark" value="white">White</option>
                        <option class="text-dark" value="blue">Blue</option>
                        <option class="text-dark" value="yellow">Yellow</option>
                    </select>
                </label>
                </div>
                <div class="p-2">

                    <label for="Photo">Photo <br>
                        <input class="form-control" name="photo" type="file" id="photo">
                    </label>
                    <br>
                </div>
                <div class="p-2">
                    <button type="submit" class="btn btn-outline-dark">Edit product</button>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection

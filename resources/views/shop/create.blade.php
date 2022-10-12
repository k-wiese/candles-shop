@extends('layout.main')


@section('content')

<div class="container ">
    <div class="text-center p-3">
        <h2>Add new product</h2>
    </div>
    <div class="row justify-content-center ">
        <div class="col-sm-5 text-center border border-dark border-2 p-3">
            <form action="{{  route('shop.store')  }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="p-2">

                    <label for="name">Name <br>
                    <input type="text" name="name" id="name" required class="text-dark">
                    </label>
                    <br>
                </div>
                <div class="p-2">

                    <label for="description">Description <br>
                    <input type="textarea" name="description" id="description" required class="text-dark">
                    </label>
                    <br>
                </div>
                <div class="p-2">

                    <label for="stripe_price">Stripe price link <br>
                    <input type="text" name="stripe_price" id="stripe_price" required class="text-dark">
                    </label>
                    <br>
                </div>
                <div class="p-2">

                    <label for="price">Price <br>
                        <input type="number" name="price" id="price" required class="text-dark">
                    </label>
                    <br>
                </div>
                <div class="p-2">

                    <select name="color" class="form-select" aria-label="Default select example">
                        <option value="black">Black</option>
                        <option value="white">White</option>
                        <option value="blue">Blue</option>
                        <option value="yellow">Yellow</option>
                    </select>
                </div>
                <div class="p-2">

                    <label for="Photo">Photo <br>
                        <input class="form-control" name="photo" type="file" id="photo" >
                    </label>
                    <br>
                </div>
                <div class="p-2">
                    <button type="submit" class="btn btn-outline-light">Add new product</button>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection

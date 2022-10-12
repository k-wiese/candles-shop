@extends('layout.main')
@section('title')Shop @endsection

@section('content')


@if(session('message'))
<div class="container">
    <div class="row">
        <div class=" col-sm-12 text-center p-2 mt-5 mb-2" >

            <p class="text-info fs-4">{{   session('message') }}</p>
        </div>
    </div>
</div>
    

@endif

@livewire('products-index')


@endsection

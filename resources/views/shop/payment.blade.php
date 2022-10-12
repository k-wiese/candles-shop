@extends('layout.main')
@section('title')Payment @endsection

@section('content')

@livewire('payment-simulation',['order'=>$order])

@endsection

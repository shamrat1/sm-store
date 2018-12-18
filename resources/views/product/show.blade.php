@extends('layouts.admin')
@section('title',"$product->name")
@section('content')
    <div class="col-xs-8">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $product->name }}</h1>
                <img src="{{ url('images/'.$product->images)}}" alt="Image">
                <hr>
            </div>

            <div class="col-md-4">
                <p>Description: {{ $product->description }}<br>
                    {{ url('images/'.$product->images)}}</p>
            </div>

        </div>


    </div>

    @endsection
@extends('layouts.admin')
@section('title','All Products List')
@section('breadcrumb','All Products')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('subproduct.create') }}" class="btn btn-primary">Add New Product</a>
        </div>
        <div class="col-md-2 offset-md-8">
            <a href="" class="btn btn-primary">View Orders</a>
        </div>
    </div>
    <br>
<div class="row">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($products as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <div class="row">
                <a href="{{ route('subproduct.show',$product->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('subproduct.edit',$product->id) }}" class="btn btn-primary" style="margin:0px 10px 0px 10px;">Edit</a>
                {{ Form::open(['route'=>["subproduct.destroy",$product->id],'method'=>'DELETE']) }}
                {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
                {{ Form::close() }}
                </div>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
</div>

    @endsection
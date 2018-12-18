@extends('layouts.admin')
@section('title','Product Edit')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('product.index') }}" class="btn btn-info">All Products</a>
        </div>
        <div class="col-md-2 offset-md-3">
            <a href="{{ route('product.show',$product->id) }}" class="btn btn-primary">View Product</a>
        </div>
        <div class="col-md-2 offset-md-3">
            {{ Form::open(['route'=>["product.destroy",$product->id],'method'=>'DELETE']) }}
            {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
            {{ Form::close() }}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>Edit the Product Information</h3>
            <hr>
            {!! Form::model($product,['route'=>['product.update',$product->id],'files'=>true,'method'=>'PUT']) !!}
            {{--product name--}}
            {{Form::label('name','Name:')}}
            {{Form::text('name',null,["class"=>"form-control",'required'=>' ','maxlength'=>'255'])}}
            {{--//Product Category--}}
            {{Form::label('category_id','Category')}}
            <select class="form-control" name="category_id" style="margin-bottom: 10px">
                @foreach($category as $category)
                    <option value="{{$category->id}}" @if($product->category_id==$category->id)
                                                          selected
                        @endif>{{$category->name}}</option>
                @endforeach
            </select>
            {{--//Product images--}}
            {{ Form::label('images','Add Product Image:') }}
            {{ Form::file('images') }}<br>
            {{--//Description--}}
            {{Form::label('description','Product Description:')}}
            {{Form::textarea('description',null,array('class'=>'form-control'))}}
            {{--UNit Price--}}
            {{ Form::label('unit_price', 'Unit Price of the Product:') }}
            {{ Form::number('unit_price',null,['class'=>'form-control']) }}
            {{--unit weight--}}
            {{ Form::label('unit_weight', 'Unit Weight of the Product:') }}
            {{ Form::number('unit_weight',null,['class'=>'form-control']) }}
            {{--quantity--}}
            {{ Form::label('quantity', 'Total Quantity:') }}
            {{ Form::number('quantity',null,['class'=>'form-control']) }}
            {{--Discount--}}
            {{ Form::label('discount', 'Discounts if any:') }}
            {{ Form::number('discount',null,['class'=>'form-control']) }}

            <br>
            {{Form::submit('Add Product', array('class'=>'btn btn-success btn-lg btn-block'))}}
            {!! Form::close() !!}

        </div>
    </div>
    @endsection
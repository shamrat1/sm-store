@extends('layouts.admin')
@section('title', 'Add Product')

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-4">
            <h3>Add New Product</h3>
            <hr>
            {!! Form::open(['route'=>'product.store','files'=>true]) !!}
            {{--product name--}}
            {{Form::label('name','Name:')}}
            {{Form::text('name',null,["class"=>"form-control",'required'=>' ','maxlength'=>'255'])}}
            {{--//Product Category--}}
            {{Form::label('category_id','Category')}}
            <select class="form-control" name="category_id" style="margin-bottom: 10px">
                @foreach($category as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
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
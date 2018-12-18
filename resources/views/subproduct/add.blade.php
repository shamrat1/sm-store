@extends('layouts.admin')
@section('title', 'Add Product')

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-4">
            <h3>Add New Product</h3>
            <hr>
            {!! Form::open(['route'=>'subproduct.store','files'=>true]) !!}
            {{--product name--}}
            {{Form::label('name','Name:')}}
            {{Form::text('name',null,["class"=>"form-control",'required'=>' ','maxlength'=>'255'])}}
            {{--//Product Category--}}
            {{Form::label('category_id','Main Product:')}}
            <select class="form-control" name="product_id" style="margin-bottom: 10px">
                @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
            {{--//Product images--}}
            {{ Form::label('image','Image:') }}
            {{ Form::file('image') }}<br>
            {{--//Description--}}
            {{Form::label('description','Description:')}}
            {{Form::textarea('description',null,array('class'=>'form-control'))}}
            {{--UNit Price--}}
            {{ Form::label('price', 'Unit Price of the Product:') }}
            {{ Form::number('price',null,['class'=>'form-control']) }}
            {{--quantity--}}
            {{ Form::label('quantity', 'Quantity:') }}
            {{ Form::number('quantity',null,['class'=>'form-control']) }}

            <br>
            {{Form::submit('Submit', array('class'=>'btn btn-success btn-lg btn-block'))}}
            {!! Form::close() !!}

        </div>
    </div>

    @endsection
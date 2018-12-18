
@extends('alt')
@section('title',"Add review $product->name")

@section('content')
    <div class="w3l_banner_nav_right">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                {!! Form::open(['route'=>'review.store'])  !!}

                        <h3>Add review of {{ $product->name }}</h3>
                        <hr>

                {{ Form::label('rating','Rating :') }}<br>
                {{ Form::selectrange('rating',1,5,['class'=>'form-control']) }}<br><br>

                {{Form::label('review','Review:')}}<br>
                {{Form::textarea('review',null,array('class'=>'form-control'))}}
                <small>Give your thoughts and opinions on the Product.</small>
                <br><br>
                {{ Form::hidden('product_id',$product->id) }}
                {{ Form::hidden('user_id',"1") }}

                {{ Form::submit('Add Review',['class'=>'btn btn-primary form-control']) }}

                {{ Form::close() }}


            </div>
        </div>
    </div>
    <div class="clearfix"></div>



@endsection
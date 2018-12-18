@extends('alt')

@section('title','show review')

@section('content')
    <div class="w3l_banner_nav_right">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <span style="color:grey">
                <h2>Review of the <a href="{{ route('pages.single',$product->slug) }}">{{ $product->name }}</a></h2><br>
                <h3>Rating : {{ $review->rating }}</h3><br>
                <p>{{ $review->review }}</p>
                    </span>
            </div>
            <div>
                <span>Created at: {{ $review->created_at }}</span>
                <span>Last Updated at: {{ $review->updated_at }}</span><br>

                <a href="{{ route('review.edit',$review->id) }}" class="btn btn-primary">Edit Review</a><br>
                {!! Form::open(['route'=>['review.destroy',$review->id],'method'=>'DESTROY']) !!}
                {{ Form::submit('Delete Review',['class'=>'btn btn-danger']) }}
                {!! Form::close() !!}

            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-1">
            <h2>Comments:</h2>
            <p>Please edit this tab after comments are added.</p>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
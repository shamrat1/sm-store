@extends('layouts.admin')
@section('title','All Reviews')

@section('content')

    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Review</th>
                <th scope="col">Rating</th>
                <th scope="col">Product ID</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($reviews as $review)
                <tr>
                    <th scope="row">{{ $review->id }}</th>
                    <td>{{ $review->review }}</td>
                    <td>{{ $review->rating }}</td>
                    <td><a href="{{ route('product.show',$review->product_id) }}">{{ $review->product_id }}</a></td>
                    <td>
                        <div class="row">
                            @if($review->isApproved == 0)
                            {{ Form::open(['route'=>["review.isApproved",$review->id],'method'=>'PATCH']) }}
                            {{ Form::submit('Approve',['class'=>'btn btn-primary']) }}
                            {{ Form::close() }}
                            @endif
                            {{ Form::open(['route'=>["review.destroy",$review->id],'method'=>'DELETE']) }}
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
@extends('layouts.admin')
@section('title',' All Categories')
@section('breadcrumb','Categories')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price Range</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->price_range }}</td>

                    <td>
                        <div class="row">
                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary" style="margin-right: 10px">EDIT</a>
                        {{ Form::open(['route'=>['category.destroy',$category->id],'method'=>'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                        </div>
                    </td>

                </tr>
                 @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="well">
            <h1>Add New Category</h1>
            {!! Form::open(['route'=>'category.store']) !!}
            {{ Form::label('name','Category') }}
            {{ Form::text('name',null,['class'=>'form-control']) }}
            {{ Form::label('price_range','Price Range') }}
            {{ Form::text('price_range',null,['class'=>'form-control']) }}
            <br>
            {{ Form::submit('Save',['class'=>'btn btn-success']) }}
            {!! Form::close() !!}
            </div>
        </div>
    </div>


    @endsection
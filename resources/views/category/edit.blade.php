@extends('layouts.admin')
@section('title','Edit Category')
@section('breadcrumb','Category - Edit')
@section('content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::model($category, ['route' => ['category.update', $category->id], 'method' => 'PUT']) !!}

            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, ["class" => 'form-control']) }}

            {{ Form::label('Price Range', "Range:", ['class' => 'form-spacing-top']) }}
            {{ Form::text('price_range', null, ['class' => 'form-control']) }}
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($category->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($category->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('category.index', 'Cancel', null, array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>

            </div>
        </div>
        {!! Form::close() !!}
    </div>	<!-- end of .row (form) -->

    @endsection


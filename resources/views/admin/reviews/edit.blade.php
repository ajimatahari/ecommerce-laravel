@extends('admin.layout')

@section('title', ' | Edit review')

@section('admin-content')

  <div class="container-fluid">

    <div class="row">
      <div class="col-md-10 offset-md-1">
        <h1 class="text-center"> Edit review </h1>
      </div>

    </div>

    <hr>

    <div class="col-md-8 offset-md-2">
        {!! Form::model($review, ['route' => ['reviews.update', $review->id], 'method' => 'PUT' ]) !!}

            <div class="form-group">
                {{ Form::label('content', 'Message') }}
                {{ Form::textarea('content', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Save changes', ['class' => 'btn btn-lg btn-block btn-success']) }}
            </div>


        {!! Form::close() !!}
    </div>

  </div>


@endsection

@extends('admin.layout')

@section('title', ' | View review')

@section('admin-content')

  <div class="container-fluid">

    <div class="col-md-8 offset-md-2">
        <h3 class="text-center"> Review details </h3>
        <hr>

        <br>

        {!! Form::model($review) !!}

          <div class="form-group">
              {{ Form::label('user_id', 'Reviewed by:') }}
              {{ Form::text('user_id', $review->user->name, ['class' => 'form-control', 'disabled' => 'true']) }}
          </div>

          <div class="form-group">
              {{ Form::label('product', 'Subject') }}
              {{ Form::text('product', $review->product->name, ['class' => 'form-control', 'disabled' => 'true']) }}
          </div>

          <div class="form-group">
              {{ Form::label('content', 'Review body') }}
              {{ Form::textarea('content', null, ['class' => 'form-control', 'disabled' => 'true']) }}
          </div>


          <div class="form-group">
              <a href="{{ route('reviews.index')}}" class="btn btn-lg btn-block btn-secondary"> Go back </a>
          </div>



        {!! Form::close() !!}
    </div>
  </div>

@endsection

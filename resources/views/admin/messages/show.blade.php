@extends('admin.layout')

@section('title', ' | View message')

@section('admin-content')

  <div class="container-fluid">

    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h1 class="text-center"> MESSAGES DASHBOARD </h1>
      </div>

    </div>

    <hr>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3 class="text-center"> Message details </h3>
            <hr>

            <br>

            {!! Form::model($message) !!}

              <div class="form-group">
                  {{ Form::label('sender', 'Name of the sender') }}
                  {{ Form::text('sender', null, ['class' => 'form-control', 'disabled' => 'true']) }}
              </div>

              <div class="form-group">
                  {{ Form::label('email', 'Email sent from') }}
                  {{ Form::text('email', null, ['class' => 'form-control', 'disabled' => 'true']) }}
              </div>

              <div class="form-group">
                  {{ Form::label('subject', 'Subject') }}
                  {{ Form::text('subject', null, ['class' => 'form-control', 'disabled' => 'true']) }}
              </div>

              <div class="form-group">
                  {{ Form::label('content', 'Message') }}
                  {{ Form::textarea('content', null, ['class' => 'form-control', 'disabled' => 'true']) }}
              </div>

              <div class="form-group">
                  <a href="{{ route('messages.index')}}" class="btn btn-lg btn-block btn-secondary"> Go back </a>
              </div>

            {!! Form::close() !!}
      </div>
    </div>
  </div>

@endsection

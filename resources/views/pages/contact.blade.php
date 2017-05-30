@extends('layouts.main')

@section('title', ' | Contact')

@section('content')

<div class="container">
  <section class="pad">
    <div class="col-md-8 offset-md-2">
      <h2 class""><strong>CONTACT PAGE</strong></h2>
    </div>

    <hr>

    <div class="col-md-8 offset-md-2">
      {!! Form::open(['url' => 'contact', 'method' => 'POST']) !!}

      <div class="form-group">
          <strong>{{ Form::label('name', 'Name:') }}</strong>
          {{ Form::text('name', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group">
          <strong>{{ Form::label('email', 'Email:') }}</strong>
          {{  Form::text('email', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group">
        <strong>{{ Form::label('subject', 'Subject:') }}</strong>
          {{  Form::text('subject', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group">
          <strong>{{ Form::label('message', 'Message:') }}</strong>
          {{  Form::textarea('message', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group">
          {{ Form::submit('Send message', ['class' => 'btn btn-success btn-lg btn-block']) }}
      </div>

      {!! Form::close() !!}

    </div>
  </section>
</div>

@stop

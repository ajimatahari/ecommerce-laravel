@extends('layouts.main')

@section('title', ' | Payment edit')


@section('content')

  <div class="container">

      <div class="row">
        <div class="col-md-8 offset-md-2"><h1><strong> Edit payment details </strong></h1></div>
      </div>
      <br>
      <hr>

      <div class="row">
        <div class="col-md-12">
            {!! Form::model($card, ['route' => ['cards.update', $card->id], 'method' => 'PUT']) !!}

            <div class="form-group">
              <strong>{{ Form::label('holder', 'Card holder name:') }}</strong>
              {{ Form::text('holder', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
              <strong>{{ Form::label('type', 'Card type:') }}</strong>
              {{ Form::text('type', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
              <strong>{{ Form::label('number', 'Card number:') }}</strong>
              {{ Form::text('number', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
              <strong>{{ Form::label('expiry_date', 'Card expiry_date:') }}</strong>
              {{ Form::text('expiry_date', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
              <strong>{{ Form::label('security_code', 'Card security code:') }}</strong>
              {{ Form::text('security_code', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {!! Form::submit('Save changes', array('class' => 'btn btn-success btn-lg btn-block')) !!}
            </div>

            {!! Form::close() !!}
          </div>
        </div>

      </div>

@endsection

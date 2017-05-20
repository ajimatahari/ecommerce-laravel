@extends('layouts.main')

@section('title', ' | Address edit')


@section('content')

  <div class="container">

      <div class="row">
        <div class="col-md-8 offset-md-2"><h1><strong> Edit address details </strong></h1></div>
      </div>
      <br>
      <hr>

      <div class="row">
        <div class="col-md-12">
            {!! Form::model($address, ['route' => ['address.update', $address->id], 'method' => 'PUT']) !!}

            <div class="form-group">
              <strong>{{ Form::label('address_line', 'Address:') }}</strong>
              {{ Form::text('address_line', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
              <strong>{{ Form::label('city', 'City:') }}</strong>
              {{ Form::text('city', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
              <strong>{{ Form::label('state', 'State:') }}</strong>
              {{ Form::text('state', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
              <strong>{{ Form::label('post_code', 'Post code:') }}</strong>
              {{ Form::text('post_code', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
              <strong>{{ Form::label('country', 'Country:') }}</strong>
              {{ Form::text('country', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {!! Form::submit('Save changes', array('class' => 'btn btn-success btn-lg btn-block')) !!}
            </div>

            {!! Form::close() !!}
          </div>
        </div>

      </div>

@endsection

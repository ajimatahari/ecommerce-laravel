@extends('layouts.main')

@section('title', ' | Address details')


@section('content')

  <div class="container">


      <div class="row">
        <div class="col-md-6 offset-md-3"><h1><strong> Account details </strong></h1></div>
        @if ($details)
            {!! Form::open(['route' => ['account-details.destroy', $details->id], 'method' => 'DELETE']) !!}
                {{  Form::submit('Clear details', ['class' => 'btn btn-lg btn-danger']) }}
            {!! Form::close() !!}
        @endif
      </div>

      <br>
      <hr>

      <div class="row">

            <div class="col-md-6">

              @if ($details)
                  {!! Form::model($details, ['route' => ['account-details.update', $details->id] , 'method' => 'PUT']) !!}
              @else
                    {!! Form::open( ['route' => 'account-details.store' , 'method' => 'POST']) !!}
              @endif

                <h3 class="text-center"><strong>Address details</strong></h3>
                <hr><br>

                    <div class="form-group">
                        {{ Form::label('address_line', 'Address line') }}
                        {{ Form::text('address_line', null, ['class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('city', 'City') }}
                        {{ Form::text('city', null, ['class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('state', 'State') }}
                        {{ Form::text('state', null, ['class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('post_code', 'Post code') }}
                        {{ Form::text('post_code', null, ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{ Form::label('country', 'Country') }}
                        {{ Form::text('country', null, ['class' => 'form-control'])}}
                    </div>

            </div> <!-- end of address container -->

            <div class="col-md-5 offset-md-1">
                <h3 class="text-center"><strong>Payment details</strong></h3>
                <hr><br>

                <div class="form-group">
                    {{ Form::label('holder_name', 'Card holder') }}
                    {{ Form::text('holder_name', null, ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{ Form::label('card_type', 'Card type') }}
                    {{ Form::text('card_type', null, ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{ Form::label('card_number', 'Card number') }}
                    {{ Form::text('card_number', null, ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{ Form::label('card_expiry_date', 'Card expiry date') }}
                    {{ Form::text('card_expiry_date', null, ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{ Form::label('card_security_code', 'Card CVV') }}
                    {{ Form::text('card_security_code', null, ['class' => 'form-control'])}}
                </div>
            </div><!-- end of payment details container-->


                <div class="form-group  col-md-6 offset-md-3">
                    @if ($details)
                        {{ Form::submit('Save changes', ['class' => 'btn btn-lg btn-success'])}}
                    @else
                        {{ Form::submit('Add details', ['class' => 'btn btn-lg btn-primary'])}}
                    @endif
                </div>

          {!! Form::close() !!}

      </div> <!-- end of row -->
  </div>


@endsection

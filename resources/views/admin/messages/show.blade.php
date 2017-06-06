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
        <div class="col-md-6 offset-md-1">
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

          <div class="col-md-4">
              <h3 class="text-center"> Reply to customer </h3>
              <hr>

              <br>

              {!! Form::open(['route' =>['messages.reply', $message->id], 'method' => 'POST']) !!}

              {{ Form::hidden('subject', $message->subject) }}
              {{ Form::hidden('from', $message->email) }}

                <div class="form-group">
                    {{ Form::label('reply', 'Reply message') }}
                    {{ Form::textarea('reply', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::submit('Send reply', ['class' => 'btn btn-lg btn-block btn-success']) }}
                </div>
              {!! Form::close() !!}

        </div>
    </div>
  </div>

@endsection

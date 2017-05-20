@extends('admin.layout')

@section('title', ' | Messages')

@section('admin-content')

  <div class="container-fluid">

    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h1 class="text-center"> MESSAGES DASHBOARD </h1>
      </div>

    </div>

    <hr>

    <div class="row">
        <div class="col-md-8">

          <table class="table table-striped table-bordered table-hover">
              <thead class="text-center">
                    <th>ID</th>
                    <th>Sender</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Content</th>
                    <th></th>

              </thead>

              <tbody>
                  @foreach ($messages as $message)
                  <tr>
                      <td> {{ $message->id }} </td>
                      <td> {{ $message->sender }} </td>
                      <td> {{ $message->email }} </td>
                      <td> {{ $message->subject }} </td>
                      <td> {{ substr($message->content, 0, 15) }}{{ strlen($message->content) > 15 ? "..." : "" }} </td>
                      <td class="btn-group-sm">
                       <a href="{{ url('admin/messages/'.$message->id) }}" class="btn btn-sm btn-secondary"> View full message </a>
                     </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>

        <div class="col-md-4">
            <h3 class="text-center"> Message details </h3>
            <hr>

            <br>

            {!! Form::open() !!}

              <div class="form-group">
                  {{ Form::label('name', 'Name') }}
                  {{ Form::text('name', null, ['class' => 'form-control']) }}
              </div>

              <div class="form-group">
                  {{ Form::label('email', 'Email') }}
                  {{ Form::text('email', null, ['class' => 'form-control']) }}
              </div>

              <div class="form-group">
                  {{ Form::label('subject', 'Subject') }}
                  {{ Form::text('subject', null, ['class' => 'form-control']) }}
              </div>

              <div class="form-group">
                  {{ Form::label('message', 'Message') }}
                  {{ Form::textarea('message', null, ['class' => 'form-control']) }}
              </div>


            {!! Form::close() !!}
      </div>
    </div>
  </div>

    <div class="col-md-8 offset-md-2">
        // further paginate
    </div>


@endsection

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
        <div class="col-md-10 offset-md-1">

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
                       <a href=# class="btn btn-sm btn-primary"> Send reply </a>
                     </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>

    </div>
  </div>

    <div class="col-md-8 offset-md-2">
        {{ $messages->links() }}
    </div>


@endsection

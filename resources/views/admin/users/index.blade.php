@extends('admin.layout')

@section('title', ' | Users')

@section('admin-content')

  <div class="container-fluid">

    <div class="row">
      <div class="col-md-8 offset-md-1">
        <h1 class="text-center"> USERS DASHBOARD </h1>
      </div>

    </div>


      <hr>

        <table class="table table-striped table-bordered  table-hover">
            <thead class="text-center">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Join date</th>
                  <th>Role</th>
                  <th>Actions</th>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    <td> {{ date('d M Y', strtotime($user->created_at)) }}</td>
                    <td>{{ $user->isAdmin() ? 'Admin' : 'Customer' }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">Make admin</a>
                        <a href="#" class="btn btn-sm btn-secondary">Send message</a>
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE' , 'class' => 'btn-inline']) !!}
          								{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
          							{!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
    </div>

@endsection

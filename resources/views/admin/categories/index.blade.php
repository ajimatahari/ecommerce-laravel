@extends('admin.layout')

@section('title', ' | Categories')

@section('admin-content-title', 'Categories management')

@section('admin-content')

  <div class="container">

    <div class="row">
      <div class="col-md-8 offset-md-1">
        <h1 class="text-center"> CATEGORIES DASHBOARD </h1>
      </div>

    </div>


      <hr>
    </div>




    <!-- Display all categories -->
    <div class="row">
      <div class="col-md-8">
        <table class="table table-striped table-bordered  table-hover">
            <thead class="text-center">
                  <th>ID</th>
                  <th>Name</th>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td> {{ $category->id }} </td>
                    <td> {{ $category->name }} </td>
                    <td> <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm"> Edit </a> </td>
                    <td>
                        {!! Form::open(array('route' => ['categories.destroy', $category->id], 'method' => 'DELETE')) !!}
                          {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div> <!-- end display -->

      <div class="col-md-3 card">
        <!-- Form to add new category -->
        {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}

        <div class="form-group">
          <strong>{{ Form::label('name', 'Category name:') }}</strong>
          {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
          {{ Form::submit('Create category', ['class' => 'btn btn-primary btn-lg btn-block']) }}
        </div>

        {!! Form::close() !!} <!-- end form -->
      </div>
</div>



@endsection

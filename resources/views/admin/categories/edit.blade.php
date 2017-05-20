@extends('admin.layout')

@section('title', ' | Categories')

@section('admin-content-title', 'Categories management')

@section('admin-content')

  <div class="container">

    <div class="row">
      <div class="col-md-8 offset-md-1">
        <h1 class="text-center"> Edit category </h1>
      </div>

    </div>

      <hr>
    </div>

<br>

      <div class="col-md-6 offset-md-3">
        <!-- Form to add new category -->
        {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}

        <div class="form-group">
          <strong>{{ Form::label('name', 'Category name:') }}</strong>
          {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
          {{ Form::submit('Update category', ['class' => 'btn btn-primary btn-lg btn-block']) }}
        </div>

        {!! Form::close() !!} <!-- end form -->
      </div>
</div>



@endsection

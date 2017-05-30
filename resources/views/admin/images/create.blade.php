
@extends('layouts.main')

@section('title', ' | Add product images')

@section('content')


    <div class="container">

      <div class="col-md-8 offset-md-2">


              <h1 class="text-center"> Add product images </h1>


          <hr>

            {!! Form::open(['route'=> 'images.store', 'files' => true, 'multiple' => true ]) !!}

            {{ Form::hidden('product_id', $product->id) }}

            <div class="form-group">
                <strong>{{ Form::label('name', 'Product name:') }}</strong>
                {{ Form::text('name', $product->name, ['class' => 'form-control', 'disabled' => true]) }}
            </div>

            <div class="form-group">
                <strong>{{ Form::label('product_image', 'Product display image:') }}</strong>
                {{ Form::file('images[]', ['class' => 'form-control', 'multiple' => true]) }}
            </div>


            <div class="form-group">
                {{ Form::submit('Save images', ['class' => 'btn btn-lg btn-block btn-success']) }}
            </div>

            {!! Form::close() !!}


      </div>

    </div>


@endsection

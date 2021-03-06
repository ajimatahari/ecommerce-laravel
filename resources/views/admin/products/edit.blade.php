
@extends('layouts.main')

@section('title', ' | Edit product')

@section('content')


    <div class="container">

      <div class="col-md-8 offset-md-2">

          <div class="row">
              <h1> Edit product </h1>
          </div>

          <hr>

            {!! Form::model($product, ['route'=> ['products.update', $product->id], 'method' => 'PUT', 'files' => true]) !!}

            <div class="form-group">
                <strong>{{ Form::label('name', 'Product name:') }}</strong>
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                <strong>{{ Form::label('description', 'Product description:') }}</strong>
                {{ Form::text('description', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                <strong>{{ Form::label('category_id', 'Category:') }}</strong>
                {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                <strong>{{ Form::label('product_image', 'Upload image:') }}</strong>
                {{ Form::file('product_image', ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                <strong>{{ Form::label('stock', 'Starting stock:') }}</strong>
                {{ Form::text('stock', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                <strong>{{ Form::label('price', 'Product price:') }}</strong>
                {{ Form::text('price', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                <strong>{{ Form::label('discounted_price', 'Product discounted price:') }}</strong>
                {{ Form::text('discounted_price', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Save changes', ['class' => 'btn btn-lg btn-success btn-block']) }}
            </div>

            {!! Form::close() !!}


      </div>

    </div>


@endsection

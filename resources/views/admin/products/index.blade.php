@extends('admin.layout')

@section('title', ' | Products')

@section('admin-content')

  <div class="container">

    <div class="row">
      <div class="col-md-8 offset-md-1">
        <h1 class="text-center"> PRODUCTS DASHBOARD </h1>
      </div>

      <div class="col-md-3">
        <a href="{{ route('products.create') }}" class="btn btn-primary btn-lg btn-block"> Create new product </a>
      </div>

    </div>


      <hr>
    </div>

    <table class="table table-striped table-bordered  table-hover">
        <thead class="text-center">
              <th>ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Category</th>
              <th>Image</th>
              <th>Showcase images</th>
              <th>Stock</th>
              <th>Normal price</th>
              <th>Discounted price</th>
              <th></th>

        </thead>

        <tbody>
            @foreach ($products as $product)
            <tr>
                <td> {{ $product->id }} </td>
                <td> {{ $product->name }} </td>
                <td> {{ substr($product->description, 0, 50) }}{{ strlen($product->description) > 15 ? "..." : "" }}</td>
                <td> {{ count($product->category) ? $product->category->name : "N/A" }} </td>
                <td> {{ $product->image }} </td>
                <td> {{ count($product->images) }} </td>
                <td> {{ $product->stock }} </td>
                <td> {{ $product->price }} </td>
                <td> {{ $product->discounted_price }} </td>
                <td class="btn-group-sm">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-secondary"> Preview </a>
                    <a href="{{ route('images.show', $product->id) }}" class="btn btn-sm btn-info"> Add more images </a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-success"> Edit </a>

                    {!! Form::open(array('route' => ['products.destroy', $product->id], 'method' => 'DELETE', 'class' => 'btn-inline')) !!}
      								{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
      							{!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="col-md-8 offset-md-2">
        {{ $products->links() }}
    </div>

@endsection

@extends('layouts.main')

@section('title', ' | Shop')


@section('content')

  <div class="container">
    <section>

      <div class="col-md-12">
        <h1 class="text-center"> WEB SHOP </h1> <br>
        <p class="text-muted text-center"> Click on the products to display full details and add them to the cart of course :) </p> <br>
      </div>

      <hr> <br>

      <p> Filters Sort by category </p>

      <hr> <br>

      <div class="col-md-12">
          <div class="row">
            @foreach ($products as $product)
              <div class="col-md-6">
                <div class="card">


                  <div class="card-block card-header">
                    <h4 class="card-title text-center"> {{ $product->name }} </h4>
                  </div>

                  <div class="card-block">
                      <p> {{ $product->description }} </p>
                  </div>

                  <div class="card-block">
                    <img class="card-img-top" src=" {{ asset('images/products/' . $product->image) }}" alt="Card image cap">
                  </div>


                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <h1 class="text-center"><span class="badge badge-pill badge-success text-center"> £{{ $product->price }} </span></h1>  </li>
                     <li class="list-group-item"> Remaining in stock: {{ $product->stock }} </li>
                  {{-- <li class="list-group-item"> Discounted price {{ $product->discounted_price }} </li>   --}}
                     <li class="list-group-item"><a href="{{ route('product.page', $product->id) }}" class="btn btn-lg btn-block btn-secondary"> View details </a>
                     <a href="{{ route('cart.addItem', $product->id) }}" class="btn btn-success btn-lg btn-block"> Add to cart </a> </li>
                   </ul>

                </div>
              </div>
            @endforeach
          </div>
      </div>
    </section>
  </div>

@endsection

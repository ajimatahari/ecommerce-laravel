@extends('layouts.main')

@section('title', ' | Product ')


@section('content')

  <div class="container">

      <div class="col-md-12">
        <h1 class="text-center"> {{ $product->name }} </h1> <br>
        <p class="text-muted text-center"> Click on the products to display full details and add them to the cart of course :) </p> <br>
      </div>

      <hr> <br>

      <div class="col-md-8 offset-md-2">

                <div class="card">
                  <div class="card-block card-header">
                    <h4 class="card-title"> {{ $product->name }} </h4>
                  </div>

                  <div class="card-block">
                      <p> {{ $product->description }} </p>
                  </div>

                  <div class="card-block">
                      {{ Html::image('images/products/' . $product->image, 'The image does not exist', ['class' => 'img-cont']) }}

                  </div>


                  <ul class="list-group list-group-flush">
                     <li class="list-group-item">
                        <div class="col-md-6">
                            <span> In stock: </span>
                        </div>

                        <div class="col-md-6">
                          <span>{{ $product->stock }}</span>
                        </div>
                     </li>

                     <li class="list-group-item">
                         <div class="col-md-6">
                             <span> Regular price: </span>
                         </div>

                         <div class="col-md-6">
                           <span>{{ $product->price }}</span>
                         </div>
                     </li>

                     <li class="list-group-item">
                         <div class="col-md-6">
                             <span> Discounted price: </span>
                         </div>

                         <div class="col-md-6">
                           <span>{{ $product->discounted_price }}</span>
                         </div>
                      </li>

                     <li class="list-group-item"><a href="{{ route('products.index') }}" class="btn btn-secondary btn-lg btn-block"> Go back </a> </li>
                   </ul>

              </div> <!-- end of card -->

      </div> <!-- end of container class -->

@endsection

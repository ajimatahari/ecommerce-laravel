@extends('admin.layout')

@section('title', ' | View order details')

@section('admin-content')

  <div class="container-fluid">

      <div class="col-md-10 offset-md-1">
          <h3 class="text-center"> Order details </h3>
          <hr>

              <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                              <div class="col-md-2"> Order id: {{ $order->id }} </div>
                              <div class="col-md-4"> Placed: {{ date('d M Y, H:i' , strtotime($order->created_at)) }} </div>
                              <div class="col-md-4"> Total order: £{{ $order->total }} </div>
                              <div class="col-md-2"> Placed by: {{ $order->user->name }} </div>
                            </div>
                        </div>

                        @foreach ($order->products as $product)
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-2">Prod main image</div>
                                <div class="col-md-6 offset-md-1 text-center"> <a href="{{ route('product.page', $product->id) }}"> {{ $product->name }} </a> </div>
                                <div class="col-md-3">
                                    
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-4"> Quantity ordered: {{ $product->pivot->qty }} </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-4"> Price: {{ $product->price }} </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="card-block col-md-8 offset-md-2">
                            <a href="{{ route('orders.index') }}" class="btn btn-lg btn-block btn-secondary"> Back to orders </a>
                          </div>
                        </div>


                        @endforeach
                    </div>
              </div>
          </div>
      </div>

@endsection

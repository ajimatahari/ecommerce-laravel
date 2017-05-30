@extends('layouts.main')

@section('title', ' | Customer orders')


@section('content')

  <div class="container">

      <div class="col-md-12">
        <h1 class="text-center"> Orders for <strong> {{ Auth::user()->name }} </strong> </h1> <br>
        <p class="text-muted text-center"> List of all orders placed by the customer. </p> <br>
      </div>

      <hr> <br>

      <?php $total = 0; ?>

      <div class="col-md-12">
          <div class="row">
            <h3> Orders summary  </h3>
          </div>

          <br>

          <div class="row">
              <table class="table table-bordered">
                <thead>
                    <th> ID </th>
                    <th> Date </th>
                    <th> Total </th>
                    <th></th>
                </thead>

                <tbody>
                  @foreach ($orders as $order)
                    <tr>
                      <td> {{ $order->id }} </td>
                      <td> {{ date('d F Y, H:i a', strtotime($order->created_at)) }} </td>
                      <td> {{ $order->total }} </td>
                      <td><a href="#" class="btn btn-secondary btn-sm"> Details </a> </td>
                      <?php $total += $order->total ?>
                    </tr>
                  @endforeach

                  <tr>
                    <td colspan="2"> Orders: {{ count($orders) }} </td>
                    <td> Total: {{ $total }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>

        <hr><br>

            <div class="row">
              <div class="col-md-12">
                <h3>Detailed orders</h3>
              </div>
            </div>



              <br>

              <div class="row">
                    @foreach ($orders as $order)
                    <div class="col-md-12">
                          <div class="card">
                              <div class="card-header">
                                  <div class="row">
                                    <div class="col-md-2"> Order id: {{ $order->id }} </div>
                                    <div class="col-md-4"> Placed: {{ $order->created_at }} </div>
                                    <div class="col-md-4"> Total order: £{{ $order->total }} </div>
                                    <div class="col-md-2"> <a href="#"> See invoice </a> </div>
                                  </div>
                              </div>

                              @foreach ($order->products as $product)
                              <div class="row">

                                  <div class="card-block col-md-12">
                                      <div class="row">
                                          <div class="col-md-2"> {{ $product->image }} </div>
                                          <div class="col-md-6 offset-md-1 text-center"> <a href="{{ route('product.page', $product->id) }}"> {{ $product->name }} </a> </div>
                                          <div class="col-md-3">
                                              <a href="{{ route('product.page', $product->id) }}" class="btn btn-sm btn-block btn-secondary"> Write a product review </a>
                                              <a href="#" class="btn btn-sm btn-block btn-secondary"> Return item </a>
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

                                      <hr>
                                  </div>
                              </div>
                              @endforeach
                          </div>
                      </div>
                    @endforeach
              </div>

          <div class="col-md-8 offset-md-2">
                {{ $orders->links() }}
          </div>
      </div>


@endsection

@extends('layouts.main')

@section('title', ' | Shop')


@section('content')

  <div class="container">

      <div class="col-md-12">
        <h1 class="text-center"> Orders for <strong> {{ Auth::user()->name }} </strong> </h1> <br>
        <p class="text-muted text-center"> List of all orders placed by the customer. </p> <br>
      </div>

      <hr> <br>

      <p> Filters Sort by category </p>

      <hr> <br>

      <?php $total = 0; ?>

      <div class="col-md-12">
          <div class="row">

            <h3> Orders summary  </h3>
              <table class="table table-bordered">
                <thead>
                    <th> ID </th>
                    <th> Date </th>
                    <th> Total </th>
                    <th></th>
                </thead>

                <tbody>
                  @foreach ($user->orders as $order)
                    <tr>
                      <td> {{ $order->id }} </td>
                      <td> {{ date('d F Y, H:i a', strtotime($order->created_at)) }} </td>
                      <td> {{ $order->total }} </td>
                      <td><a href="#" class="btn btn-secondary btn-sm"> Details </a></td>
                      <?php $total += $order->total ?>
                    </tr>
                  @endforeach

                  <tr>
                    <td colspan="2"> Orders: {{ count($user->orders) }} </td>
                    <td> Total: {{ $total }}</td>
                  </tr>
                </tbody>
              </table>
            </div>

              <hr>

              <h3>Detailed orders</h3>

              <br>
              @foreach ($user->orders as $order)

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

                        @foreach ($order->products as $prod)
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-2">Prod main image</div>
                                <div class="col-md-6 offset-md-1 text-center"> <a href="#"> {{ $prod->name }} </a> </div>
                                <div class="col-md-3">
                                    <a href="#" class="btn btn-sm btn-block btn-secondary"> Write a product review </a>
                                    <a href="#" class="btn btn-sm btn-block btn-secondary"> Return item </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"> Quantity ordered: {{ $prod->pivot->qty }} </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"> Price: {{ $prod->price }} </div>
                            </div>
                            <hr>
                        </div>

                        <hr>
                        @endforeach
                    </div>
                </div>
              @endforeach

          </div>
      </div>


@endsection

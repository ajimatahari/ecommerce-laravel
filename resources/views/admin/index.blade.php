
@extends('admin.layout')

@section('title', ' | Admin dashboard')


    @section('admin-content-title', 'Stats overview')

    @section('admin-content')

        <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <h3 class="text-center"> GROSS TOTALS</h3>
                <hr>

                <div class="row text-center">
                    <div class="col-md-6">
                        <h5> Total revenue </h5> <br>
                        <p>
                          <?php
                              $revenue =0;
                              foreach ($orders as $order) {
                                $revenue += $order->total;
                              }
                          ?>

                          {{ $revenue }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <h5> Total orders </h5> <br>
                        <p> {{ count($orders) }} </p>
                    </div>

                    <div class="col-md-6">
                        <h5> Total users </h5> <br>
                        <p> {{ count($users) }} </p>
                    </div>

                    <div class="col-md-6">
                        <h5> Total products </h5> <br>
                        <p> {{ count($products) }} </p>
                    </div>
                </div> <!-- end of row -->
              </div> <!-- end of div col 10-->

              <br>

              <div class="col-md-5 offset-md-1">
                  <div class="row">
                    <h3 class="text-center"> LAST 10 ORDERS </h3>
                  </div>

                  <div class="row">
                      <table class="table">
                          <thead>
                              <th>#</th>
                              <th>Customer</th>
                              <th>Date placed</th>
                              <th>Order total</th>
                              <th>Delivered</th>
                          </thead>

                          <tbody>
                            @foreach ($users as $last)
                                @foreach ($last->orders as $order)
                                  <tr>
                                    <td> {{ $last->id }} </td>
                                    <td> {{ $last->name }} </td>
                                    <td> {{ $last->created_at }} </td>
                                    <td> {{ $order->total }} </td>
                                    <td> {{ $order->delivered ?  "Yes" : "No" }} </td>
                                  </tr>
                                @endforeach
                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>

            <br><br>

          <div class="row">
              <div class="col-md-5 offset-md-1">
                  <div class="row">
                    <h3 class="text-center"> LAST 10 REGISTERS </h3>
                  </div>

                  <div class="row">
                      <table class="table">
                          <thead>
                              <th>#</th>
                              <th>Name</th>
                              <th>Registered at </th>
                              <th>Status</th>
                          </thead>

                          <tbody>
                            @foreach ($lastTenUsers as $last)
                              <tr>
                                <td> {{ $last->id }} </td>
                                <td> {{ $last->name }} </td>
                                <td> {{ date('d M Y', strtotime($last->created_at)) }} </td>
                                <td> {{ $last->isAdmin() ? "Customer, Admin" : "Customer" }} </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>

              <div class="col-md-5 offset-md-1">
                  <div class="row">
                    <h3 class="text-center"> TOP 5 PRODUCTS SOLD </h3>
                  </div>

                  <div class="row">
                      
                  </div>
              </div>

            </div>
        </div>
    @endsection

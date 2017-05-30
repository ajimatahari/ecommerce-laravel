
@extends('admin.layout')

@section('title', ' | Admin dashboard')


    @section('admin-content-title', 'Stats overview')

    @section('admin-content')
      <?php
          $revenue =0;
          foreach ($orders as $order) {
            $revenue += $order->total;
          }
      ?>
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                  <!-- Last 10 users registered -->
                  <div class="card card">
                      <div class="card-header text-center"> <strong>LAST 10 USERS REGISTERED </strong> </div>
                      <div class="card-block">
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
                      </div> <!-- end of card block container -->
                  </div> <!-- end of last 10 users registered container -->
              </div>

              <div class="col-md-6">
                  <!-- Last 10 orders placed -->
                  <div class="card card">
                      <div class="card-header text-center"> <strong>LAST 10 ORDERS</strong> </div>
                      <div class="card-block">
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
                      </div> <!-- end of card block container -->
                  </div> <!-- end of last 10 orders container -->
              </div>
          </div> <!-- end of row -->


          <div class="row">
              <div class="col-md-6">
                  <!-- Stats overview -->
                  <div class="card card">
                      <div class="card-header text-center"> <strong>GROSS TOTALS</strong> </div>
                      <div class="card-block">
                            <div class="row text-center">
                              <div class="col-md-6"><strong>Total revenue</strong></div>
                              <div class="col-md-6"><strong>Total customers</strong></div>
                            </div>

                            <div class="row text-center">
                              <div class="col-md-6">{{ $revenue }}</div>
                              <div class="col-md-6">{{ count($users) }}</div>
                            </div>

                            <hr>

                            <div class="row text-center">
                              <div class="col-md-6"><strong>Total orders</strong></div>
                              <div class="col-md-6"><strong>Total products</strong></div>
                            </div>

                            <div class="row text-center">
                              <div class="col-md-6">{{ count($orders) }}</div>
                              <div class="col-md-6">{{ count($products) }}</div>
                            </div>
                      </div> <!-- end of card block container -->
                  </div> <!-- end of stats overview container -->
              </div>

              <div class="col-md-6">
                  <!-- Last 5 products sold -->
                  <div class="card card">
                      <div class="card-header text-center"> <strong>TOP 5 PRODUCTS SOLD </strong> </div>
                      <div class="card-block">

                      </div> <!-- end of card block container -->
                  </div> <!-- end of last 10 users registered container -->
              </div>
          </div> <!-- end of row -->
      </div> <!-- end of container fluid -->
    @endsection

@extends('admin.layout')

@section('title', ' | Orders')

@section('admin-content')

  <div class="container">

    <div class="row">
      <div class="col-md-8 offset-md-1">
        <h1 class="text-center"> ORDERS DASHBOARD </h1>
      </div>

    </div>


      <hr>
    </div>

    <table class="table table-striped table-bordered  table-hover">
        <thead class="text-center">
              <th>ID</th>
              <th>User</th>
              <th>Placed at</th>
              <th>Total</th>
              <th>Delivered</th>
              <th></th>

        </thead>

        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td> {{ $order->id }} </td>
                <td> {{ $order->user->name }} </td>
                <td> {{ date('D m Y, H:i', strtotime($order->created_at)) }} </td>
                <td> {{ $order->total }} </td>
                <td> {{ $order->delivered }} </td>
                <td class="btn-group-sm">
                  <a href="{{ route('orders.show', $order->id) }}" class="btn btn-secondary btn-sm"> View details </a>
                  <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-success btn-sm"> Edit order</a>
                  <a href="#" class="btn btn-sm btn-warning"> Mark as delivered</a>
                    {!! Form::open(array('route' => ['orders.destroy', $order->id], 'method' => 'DELETE', 'class' => 'btn-inline')) !!}
      								{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
      							{!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="col-md-8 offset-md-2">
        {{ $orders->links() }}
    </div>


@endsection

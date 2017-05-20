@extends('layouts.main')

@section('title', ' | Cart')

@section('content')

  <div class="container">

    <h1 class="text-center"> Cart items </h1>
    <hr> <br>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th></th>
        </tr>
      </thead>

      <tbody>

          @foreach ($items as $item)
            <tr>
              <td>{{ $item->name }}</td>
              <td>£{{ $item->price }}</td>
              <td>
                  {!! Form::open(['route' => ['cart.update', $item->rowId], 'method' => 'PUT' ]) !!}
                    {{ Form::text('qty', $item->qty, ['class' => 'text-center']) }} <br><br>
                    {{ Form::submit('Update quantity', ['class' => 'btn btn-sm btn-secondary']) }}
                  {!! Form::close() !!}
              </td>
              <td>
                  {!! Form::open(['route'=> ['cart.destroy', $item->rowId], 'method' => 'DELETE']) !!}
                    {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) }}
                  {!! Form::close() !!}
              </td>
            </tr>
          @endforeach

          <tr>
            <td></td>
            <td colspan="1">
              <br>
              <strong>Subtotal:</strong>  <br><hr>
              <strong>Tax:</strong> <br><hr>
              <strong>Grand total:</strong> <br><hr>
            </td>

            <td>
              <br>
              £{{ Cart::subtotal() }} <br><hr>
              £{{ Cart::tax() }} <br><hr>
              £{{  Cart::total() }} <br> <hr>
            </td>
          </tr>

      </tbody>
    </table>

    <br>

    <div class="row">
        <div class="col-md-6">
            <a href="#" class="btn btn-lg btn-primary btn-block"> Save wishlist </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('checkout') }}" class="btn btn-lg  btn-primary btn-block"> Checkout </a>
        </div>
    </div>


  </div>
@endsection

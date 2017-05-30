@extends('layouts.main')

@section('title', ' | Address details')


@section('content')

  <div class="container">


      <div class="row">
        <div class="col-md-6 offset-md-3"><h1><strong> Address details </strong></h1></div>
        <div class="col-md-3"><a href="#" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#modal-new-address"> Add address </a></div>
      </div>

      <br>
      <hr>

      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered">
              <thead>
                  <th> # </th>
                  <th> Address line </th>
                  <th> City </th>
                  <th> State </th>
                  <th> Post code </th>
                  <th> Country </th>
                  <th> Billing address </th>
                  <th> Shipping address </th>
                  <th> </th>
              </thead>
              <tbody>
                @foreach ($user->addresses as $address)
                  <tr>
                    <td> {{ $address->id }} </td>
                    <td> {{ $address->address_line }} </td>
                    <td> {{ $address->city }} </td>
                    <td> {{ $address->state }} </td>
                    <td> {{ $address->post_code }} </td>
                    <td> {{ $address->country }} </td>
                    <td> {{ $address->billing_address ? "Yes" : "No" }} </td>
                    <td> {{ $address->shipping_address ? "Yes" : "No" }} </td>
                    <td>

                      <a href="{{ route('address.edit', $address->id) }}" class="btn btn-sm btn-block btn-success"> Edit </a>

                      {!! Form::open(['route' => ['address.destroy', $address->id], 'method' => 'DELETE', 'class' => 'btn-inline btn-block']) !!}
                          {{  Form::submit('Delete', ['class' => 'btn btn-sm btn-block btn-danger']) }}
                      {!! Form::close() !!}

                    {{-- Display the default billing button if the address is not by default  --}}
                      @if (!$address->billing_address)
                        <a href="{{ route('address.toggleBillingAddress', $address->id) }}" class="btn btn-sm btn-block btn-secondary"> Default billing </a>
                      @endif

                      {{-- Display the default shippinh button if the address is not by default  --}}
                      @if (!$address->shipping_address)
                        <a href="{{ route('address.toggleShippingAddress', $address->id) }}" class="btn btn-sm btn-block btn-secondary"> Default shipping </a>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div> <!-- end of address container -->
      </div> <!-- end of row -->
  </div>


        <!-- Set new address modal form -->
          <div class="modal fade" id="modal-new-address" tabindex="-1" role="dialog" aria-labelledby="newAddress" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="newAddress"> New address </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'address.store', 'method' => 'POST']) !!}

                    <div class="form-group">
                      <strong>{{ Form::label('address_line', 'Address:') }}</strong>
                      {{ Form::text('address_line', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                      <strong>{{ Form::label('city', 'City:') }}</strong>
                      {{ Form::text('city', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                      <strong>{{ Form::label('state', 'State:') }}</strong>
                      {{ Form::text('state', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                      <strong>{{ Form::label('post_code', 'Post code:') }}</strong>
                      {{ Form::text('post_code', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                      <strong>{{ Form::label('country', 'Country:') }}</strong>
                      {{ Form::text('country', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Create address', array('class' => 'btn btn-primary btn-lg btn-block')) !!}
                    </div>


                    {!! Form::close() !!}
                </div>

              </div>
            </div>
          </div><!-- end new address modal form -->

@endsection

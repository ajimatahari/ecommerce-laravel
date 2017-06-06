
@extends('layouts.main')

@section('title', ' | Checkout')

@section('content')

    <div class="container">
      <section>
      <div class="row">

        <!-- Billing details -->
        <div class="col-md-5">
            <h3 class="text-center">Shipping details</h3>
            <hr> <br>

          <div class="row form-group">
                <div class="col-md-4"> <strong>{{ Form::label('select_shipping', 'Select address:') }}</strong> </div>
                <div class="col-md-8">
                  <select class="form-control" name="category">
            					@foreach($addresses as $address)
            						<option value='{{ $address->id }}'> {{ $address->address_line }} </option>
            					@endforeach
          				</select>
                </div>
          </div>

          <br>

          @foreach($addresses as $addresss)
              <div class="shipping_address">
                  @if ($address->billing_address)
                      <br> {{ $address->address_line }}
                      <br> {{ $address->city }}
                      <br> {{ $address->state }}
                      <br> {{ $address->post_code }}
                      <br> {{ $address->country }}
                  @endif
             </div>
          @endforeach

          {!! Form::close() !!}
        </div> <!-- end of shipping details -->


        <!-- Shipping details -->
        <div class="col-md-5 offset-md-1">
            <h3 class="text-center"> Billing details</h3>
            <hr> <br>

            <div class="row form-group">
                  <div class="col-md-10">
                    <select class="form-control" name="category">
                        @foreach($addresses as $address)
                          <option value='{{ $address->id }}'> {{ $address->address_line }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <br>

            @foreach($addresses as $s)
                <div class="shipping_address">
                  @if ($address->shipping_address)
                      <br> {{ $address->address_line }}
                      <br> {{ $address->city }}
                      <br> {{ $address->state }}
                      <br> {{ $address->post_code }}
                      <br> {{ $address->country }}
                  @endif
                </div>
            @endforeach
          {!! Form::close() !!}
        </div> <!-- end of shipping details -->

      </div> <!-- end of row -->

<br><br>

      <div class="row">
        <!-- Payment details -->
        <div class="col-md-12">
            <h3 class="text-center">Payment details</h3>
            <hr><br>

            {!! Form::open(['route' => 'checkout.completeOrder', 'method' => 'POST', 'id' => 'payment-form']) !!}

              <div class="form-row">
                <label for="card-element">
                  Credit or debit card
                </label>
                <div id="card-element">
                  <!-- a Stripe Element will be inserted here. -->

                </div>

                <!-- Used to display form errors -->
                <div id="card-errors"></div>
              </div>

              <br>

              <div class="form-group">
                  <button class="btn btn-success btn-lg btn-block"> Buy now </button>
              </div>

            {!! Form::close() !!}


        </div> <!-- end of payment details -->
      </div>
    </section>
  </div>

@endsection


@section('scripts')

  <script type="text/javascript">

  // initialize stripe client - provide API key
  var stripe = Stripe('pk_test_r3y0aPWDzWt8vDwHsJC86Zeh');
  var elements = stripe.elements();

      //  tom styling can be passed to options when creating an Element.
      var style = {
        base: {
          // Add your base input styles here. For example:
          fontSize: '16px',
          lineHeight: '24px'
        }
      };

      // Create an instance of the card Element
      var card = elements.create('card', {style: style});

      // Add an instance of the card Element into the `card-element` <div>
      card.mount('#card-element');

      // Add event listener
        card.addEventListener('change', function(event) {
          var displayError = document.getElementById('card-errors');
        if (event.error) {
          displayError.textContent = event.error.message;
        } else {
          displayError.textContent = '';
        }
        });


        // Create a token or display an error when the form is submitted.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
          event.preventDefault();

          stripe.createToken(card).then(function(result) {
            if (result.error) {
              // Inform the user if there was an error
              var errorElement = document.getElementById('card-errors');
              errorElement.textContent = result.error.message;
            } else {
              // Send the token to your server
              stripeTokenHandler(result.token);
            }
          });
        });


      function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
      }
  </script>


@endsection

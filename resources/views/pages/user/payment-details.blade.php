@extends('layouts.main')

@section('title', ' | Payment details')


@section('content')

  <div class="container">


      <div class="row">
        <div class="col-md-6 offset-md-3"><h1><strong> Payment details </strong></h1></div>
        <div class="col-md-3"><a href="#" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#modal-new-card"> Add new card </a></div>
      </div>

      <br>
      <hr>

      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered">
              <thead>
                  <th> # </th>
                  <th> Card holders name </th>
                  <th> Card type </th>
                  <th> Card number </th>
                  <th> Expiry date </th>
                  <th> CVC </th>
                  <th> Default card </th>
                  <th> </th>
              </thead>
              <tbody>
                @foreach ($user->cards as $card)
                  <tr>
                    <td> {{ $card->id }} </td>
                    <td> {{ $card->holder }} </td>
                    <td> {{ $card->type }} </td>
                    <td> {{ $card->number }} </td>
                    <td> {{ $card->expiry_date }} </td>
                    <td> {{ $card->security_code }} </td>
                    <td> {{ $card->default_card ? "Yes" : "No" }} </td>
                    <td>

                      <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-sm btn-block btn-success"> Edit </a>

                      {!! Form::open(['route' => ['cards.destroy', $card->id], 'method' => 'DELETE', 'class' => 'btn-inline btn-block']) !!}
                          {{  Form::submit('Delete', ['class' => 'btn btn-sm btn-block btn-danger']) }}
                      {!! Form::close() !!}

                    {{-- Check if the card is the default payment  --}}
                      @if ($card->default_card)
                        <a href="{{ route('cards.toggleDefaultCard', $card->id) }}" class="btn btn-sm btn-block btn-secondary"> Unset default </a>
                      @else
                        <a href="{{ route('cards.toggleDefaultCard', $card->id) }}" class="btn btn-sm btn-block btn-secondary"> Default card </a>
                      @endif

                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div> <!-- end of card container -->
      </div> <!-- end of row -->
  </div>


        <!-- Set new card modal form -->
          <div class="modal fade" id="modal-new-card" tabindex="-1" role="dialog" aria-labelledby="newCard" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="newCard"> New card </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'cards.store', 'method' => 'POST']) !!}

                    <div class="form-group">
                      <strong>{{ Form::label('holder', 'Card holder name:') }}</strong>
                      {{ Form::text('holder', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                      <strong>{{ Form::label('type', 'Card type:') }}</strong>
                      {{ Form::text('type', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                      <strong>{{ Form::label('number', 'Card number:') }}</strong>
                      {{ Form::text('number', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                      <strong>{{ Form::label('expiry_date', 'Expiry date:') }}</strong>
                      {{ Form::text('expiry_date', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                      <strong>{{ Form::label('security_code', 'Card security code:') }}</strong>
                      {{ Form::text('security_code', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Add card', array('class' => 'btn btn-primary btn-lg btn-block')) !!}
                    </div>


                    {!! Form::close() !!}
                </div>

              </div>
            </div>
          </div><!-- end new card modal form -->

@endsection

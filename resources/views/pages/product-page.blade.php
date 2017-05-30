@extends('layouts.main')

@section('title', ' | Product ')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.css">
@endsection

@section('content')

  <div class="container">

      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center"> {{ $product->name }} </h1> <br>
          <p class="text-muted text-center"> Click on the products to display full details and add them to the cart of course :) </p> <br>
        </div>
      </div>


      <hr> <br>

    <div class="row">
      <div class="col-md-5 offset-md-1">
                <div class="card">
                  <div class="card-block card-header">
                    <h4 class="card-title"> {{ $product->name }} </h4>
                  </div>

                  <div class="card-block">
                      <p> {{ $product->description }} </p>
                  </div>

                  <div class="card-block">
                      {{ Html::image('images/products/' . $product->image, 'The image does not exist', ['class' => 'img-cont']) }}
                  </div>


                  <ul class="list-group list-group-flush">
                     <li class="list-group-item">
                        <div class="col-md-6">
                            <span> In stock: </span>
                        </div>

                        <div class="col-md-6">
                          <span>{{ $product->stock }}</span>
                        </div>
                     </li>

                     <li class="list-group-item">
                         <div class="col-md-6">
                             <span> Regular price: </span>
                         </div>

                         <div class="col-md-6">
                           <span>{{ $product->price }}</span>
                         </div>
                     </li>

                     <li class="list-group-item">
                         <div class="col-md-6">
                             <span> Discounted price: </span>
                         </div>

                         <div class="col-md-6">
                           <span>{{ $product->discounted_price }}</span>
                         </div>
                      </li>

                     <li class="list-group-item">
                        <a href="{{ route('shop') }}" class="btn btn-secondary btn-lg btn-block"> Go back </a>
                        <a href="{{ route('cart.addItem', $product->id) }}" class="btn btn-success btn-lg btn-block"> Add to cart </a>
                     </li>
                   </ul>

              </div> <!-- end of card -->
      </div> <!-- end of product container -->

      <div class="col-md-5" id="display">
                @foreach ($product->images as $image)
                    <div class="col-md-6">
                        <a href="{{ asset('images/products/'. $image->filename) }}">
                            {{ Html::image('images/products/' . $image->filename, 'The image does not exist', ['class' => 'img-cont']) }}
                        </a>
                    </div>
                @endforeach
        </div>
    </div> <!-- end of card row -->

    <br><hr>

    <div class="row">
      <br>
      <div class="col-md-10 offset-md-1">
        <h3 class="text-center"> Reviews </h3><br>
      </div>

      <br>

      <div class="col-md-12">
          {!! Form::open(['route' => 'reviews.store', 'method' => 'POST']) !!}

          {{ Form::hidden('product_id', $product->id) }}
          {{ Form::hidden('user_id', Auth::user()->id) }}

          <div class="form-group">
              <strong>{{ Form::label('content', 'Post new review') }}</strong>
              {{ Form::textarea('content', null, ['class' => 'form-control', 'rows' => '3']) }}
          </div>

          <div class="form-group">
              {{ Form::submit('Add review', ['class' => 'btn btn-lg btn-block btn-primary'])}}
          </div>

          {!! Form::close() !!}<br>
      </div>

      <br>

      <div class="col-md-12">
          @foreach($product->reviews as $review)
            @if ($review->approved)
                <table class="table table-bordered">
                  <thead>
                    <th> Posted by: {{ $review->user->name }}</th>
                    <th> </th>
                    <th> At: {{ $review->created_at }}</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="3"> {{ $review->content }} </td>
                    </tr>
                  </tbody>
                </table>
              @endif
          @endforeach
      </div>

    </div> <!-- end of product specs details -->
    <br>

</div>
@endsection

@section('scripts')
  <script src="https://cdn.jsdelivr.net/lightgallery/1.3.9/js/lightgallery.min.js"></script>

  <script type="text/javascript">
      lightbox.option({
        'resizeDuration': 1000,
        'wrapAround': true,
        'maxWidth': 20000,
        'maxHeigth': 20000
      });

      $(document).ready(function() {
           $("#display").lightGallery();
       });
  </script>
@endsection

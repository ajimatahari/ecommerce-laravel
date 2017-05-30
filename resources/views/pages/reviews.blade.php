@extends('layouts.main')

@section('title', ' | Reviews')


@section('content')

  <div class="container">
      <section class="pad">
          <div class="col-md-12">
            <h1 class="text-center"> Reviews summary </h1> <br>
            <p class="text-muted text-center"> List of all reviews written by you. </p> <br>
          </div>

          <hr> <br>
              @foreach ($user->reviews as $review)
                  <div class="row">
                      <div class="card col-md-12">
                          <div class="card-header">
                            <div class="row">
                              <div class="col-md-4"> Review #: {{ $review->id }} </div>
                              <div class="col-md-4"> Written at: {{ date('d M Y, H:i', strtotime($review->created_at)) }} </div>
                              <div class="col-md-4"> Review approved: {{ $review->approved ? "Yes" : "No" }} </div>
                            </div>
                          </div> <!-- /. end of card header -->

                          <div class="card-block">
                              <div class="row">
                                  <div class="col-md-4"> {{ $review->content }} </div>
                              </div>
                              <br>
                              <div class="row">
                                  <div class="col-md-4"> For product: <a href="{{ route('product.page', $review->product_id) }}" class="btn btn-sm btn-primary"> Go to {{ App\Product::find($review->product_id)->name }}</a> </div>
                              </div>
                          </div> <!-- ./ end of card block -->
                      </div> <!-- /. end of card -->
                  </div>

                  <br>
              @endforeach



        </section>
      </div>


@endsection

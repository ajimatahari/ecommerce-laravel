@extends('admin.layout')

@section('title', ' | Reviews')

@section('admin-content')

  <div class="container-fluid">

    <div class="row">
      <div class="col-md-10 offset-md-1">
        <h1 class="text-center"> REVIEWS DASHBOARD </h1>
      </div>

    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">

          <table class="table table-striped table-bordered table-hover">
              <thead class="text-center">
                    <th>#</th>
                    <th>Reviewer</th>
                    <th>Product</th>
                    <th>Content</th>
                    <th>Approved</th>
                    <th></th>

              </thead>

              <tbody>
                  @foreach ($reviews as $review)
                  <tr>
                      <td> {{ $review->id }} </td>
                      <td> {{ $review->user->name }} </td>
                      <td> {{ $review->product->name }} </td>
                      <td> {{ substr($review->content, 0, 30) }}{{ count($review->content) > 30 ? "..." : "" }} </td>
                      <td> {{ $review->approved ? "Yes" : "No"}} </td>
                      <td class="btn-group-sm">
                       <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-sm btn-primary">  Edit review </a>
                       <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-sm btn-secondary"> View full review </a>
                       <a href="{{ route('reviews.approve', $review->id) }}" class="btn btn-sm btn-success"> {{ $review->approved ? "Unapprove review" : "Approve review" }}</a>

                       {!! Form::open(['route' => ['reviews.destroy', $review->id], 'method' => 'DELETE', 'class'=> 'btn-inline']) !!}
                          {{  Form::submit('Delete review', ['class' => 'btn btn-sm btn-danger'])}}
                       {{ Form::close() }}
                     </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>

  </div>

    <div class="col-md-8 offset-md-2">
        {{ $reviews->links() }}
    </div>


@endsection

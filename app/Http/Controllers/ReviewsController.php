<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use Auth;
use Session;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // grab all review
        $reviews = Review::all();

        // pass variable to the view
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create new Review object
        $review = new Review();

        // validate input
        $this->validate($request, [
          'content' => 'required | min:10 | max:5000'
        ]);

        $review->user_id = $request->user_id;
        $review->product_id = $request->product_id;
        $review->content = $request->content;
        $review->approved = 0;
        $review->save();

        // set flash message
        Session::flash('success', 'The review was created. It is currently pending approval.');

        // redirect user back
        return redirect()->route('product.page', $request->product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approve($id) {
      // grab message and approve it
      $review = Review::find($id);
      $review->approved = 1;
      $review->save();

      // set flash message
      Session::flash('success', 'Review approved. Now it will show onto the product page.');

      // redirect user to review page
      return redirect()->route('reviews.index');
    }
}

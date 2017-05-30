<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Notifications\Notif;
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
        $reviews = Review::paginate(20);

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

        // Notify admin for new review
        Auth::user()->notify(new Notif);

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
        $review = Review::find($id);
        return view('admin.reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get review
        $review = Review::find($id);
        return view('admin.reviews.edit', compact('review'));
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
      // validate input
      $this->validate($request, [
        'content' => 'required | min:10 | max:5000'
      ]);

      $review = Review::find($id);
      $review->content = $request->content;
      $review->save();

      // set flash message
      Session::flash('success', 'The review was created. It is currently pending approval.');

      // redirect user back
      return redirect()->route('reviews.index');
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
        $review = Review::find($id);
        $review->delete();

        // set flash message
        Session::flash('success', 'Review deleted.');

        // redirect
        return redirect()->route('reviews.index');
    }

    public function toggleApproval($id) {
      // grab message and approve it
      $review = Review::find($id);

      if (!$review->approved) {
        $review->approved = 1;
        $review->save();

        // set flash message
        Session::flash('success', 'Review approved. Now it will show onto the product page.');
      } else {
        $review->approved = 0;
        $review->save();

        // set flash message
        Session::flash('warning', 'The review status is now pending approval.');
      }

      // redirect user to review page
      return redirect()->route('reviews.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get cart content
        $items = Cart::content();

        // pass items to the view
        return view('cart.index')->withItems($items);
    }


    public function addItem($id) {
      // find product
      $product = Product::find($id);

      // add item to the Cart
      Cart::add($product->id, $product->name, 1, $product->price, []);

      // set flash message
      Session::flash('success', 'Item added to the cart.');

      // redirect
      return back();
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
            'qty' => 'integer | between:0,999999'
        ]);

        // update cart
        Cart::update($id, $request->qty);

        // set flash message
        Session::flash('success', 'Item quantity updated');

        // redirect user to cart
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // delete item
        Cart::remove($id);

        // set flash message
        Session::flash('success', 'Item removed from the cart.');

        // redirect to the cart index
        return back();
    }
}

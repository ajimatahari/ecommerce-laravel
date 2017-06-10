<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Cart;
use App\Order;
use App\AccountDetails;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    // check if user is logged in
    public function getIndex() {

      if (Cart::total() == 0 ) {

        Session::flash('fail', 'Add an item to the cart before checkout.');
        return redirect()->route('shop');
      } else {
            if (Auth::check()) {

              // grab details
                $details = AccountDetails::where('user_id', Auth::user()->id)->first();
              // redirect user to shipping details
              return view('pages.checkout', compact('details'));

            } else {
              Session::flash('fail', 'You need to login before checkout.');
              return redirect('login');
            }
        }
    }


    public function getPaymentIndex() {
      return view('pages.payment');
    }

    // store payment
    public function completeOrder(Request $request) {
      
        // Payment details
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_joubn94mWqGUPDHDZ5eCsoQt");

        // Token is created using Stripe.js or Checkout!
        // Get the payment token submitted by the form:
        $token = $request->stripeToken;

        // Charge the user's card:
        $charge = \Stripe\Charge::create(array(
          "amount" => Cart::total()*100,
          "currency" => "gbp",
          "description" => "Example charge",
          "source" => $token,
        ));

        // Create new order
        Order::createOrder();

        // Create invoice
          // \Stripe\Invoice::create(array(
          //     "customer" => "cus_AirsSJNVuh97Jb"
          // ));

        // reset cart content
        Cart::destroy();

        // set flash message
         Session::flash('success', 'Order placed. You can check the order details on your account. Thank your for your custom.');

         // redirect
         return redirect()->route('shop');

    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Product;
use App\User;
use App\Order;
use Mail;
use Session;
use App\Message;
use Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    // get home page
    public function getIndex() {
      return view('pages.index');
    }

    public function getContact() {
      return view('pages.contact');
    }

    public function postContact(Request $request) {

        // validate input
        $this->validate($request, [
          'name' => 'required | max:255',
          'email' => 'required | email',
          'subject' => 'required | min:3 | max:100',
          'message' => 'required | min:5'
        ]);

        // set data to pass into the view
        $data = [
          'name' => $request->name,
          'email'=> $request->email,
          'subject' => $request->subject,
          'content' => $request->message
        ];

        // send mail
        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('andrei.hribanas@gmail.com');
            $message->subject($data['subject']);
        });

        // save message
        $messageSent = new Message;
        $messageSent->sender = $data['name'];
        $messageSent->email = $data['email'];
        $messageSent->subject = $data['subject'];
        $messageSent->content = $data['content'];
        $messageSent->user_id = Auth::user()->id;
        $messageSent->save();

        // set flash message
        Session::flash('success', 'Thank you for your message. I will contact you shortly.');

        // redirect
        return redirect()->route('contact');

    }

    public function getPaymentDetails() {
      $user = User::find(Auth::user()->id);
      return view('pages.user.payment-details', compact('user'));
    }

    public function getShop() {
      // grab all products and assign them to a variable
      $products = Product::all();

      // pass products to the shop view
      return view('pages.shop')->withProducts($products);
    }


    public function showProduct($id) {
        // get product
        $product = Product::find($id);
        return view('pages.product-page', compact('product'));
    }

    public function getUserOrders() {
      // grab all user orders
      $user = User::find(Auth::user()->id);
      // return view
      return view('pages.orders', compact('user'));
    }

    public function getDashboard() {
      // grab all products
      $products = Product::all();

      // grab all users
      $users = User::all();

      // grab last 10 users registered
      $lastTenUsers = User::orderBy('id', 'desc')->take(10)->get();

      // grab all ordes
      $orders = Order::all();

      return view('admin.index', compact('products', 'users', 'lastTenUsers', 'orders'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;
use Session;

class WishlishtController extends Controller
{
    //
    public function index() {
        
    }

    public function store() {
      // store cart instance
      Cart::instance('wishlist')->store(Auth::user()->id);

      // set flash message
      Session::flash('success', 'The wishlist is saved.');

      return back();
    }
}

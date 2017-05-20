<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Cart;

class Order extends Model
{
    //
    protected $fillable = ['total', 'delivered'];

    public function orderItems() {
      return $this->belongsToMany('App\Product')->withPivot('qty', 'total')->withTimestamps();
    }

    public function products() {
      return $this->belongsToMany('App\Product')->withPivot('qty', 'total')->withTimestamps();
    }

    public function user() {
      return $this->belongsTo('App\User');
    }

    public static function createOrder()
    {
      // Create new order
      $user = Auth::user();
      $order = $user->orders()->create([
        'total' => Cart::total(),
        'delivered' => 0
      ]);

      // Put cart items in the order details
      $cartItems = Cart::content();
      foreach ($cartItems as $item) {
        $order->orderItems()->attach($item->id, [
          'qty' => $item->qty,
          'total' => $item->qty * $item->price
        ]);
      }
    }
}

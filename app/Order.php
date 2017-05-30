<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Cart;
use Mail;

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

        // Send order place confirmation
        $data = [
          'name' => 'Company name',
          'email'=> 'andrei.hribanas@gmail.com',
          'subject' => 'Order confirmation: '. $order->id ,
          'to' =>  $order->user->email,
          'content' => 'Payment received for the order. The goods will be dispatched soon.'
        ];

        // send order confirmation mail
        Mail::send('emails.confirm_order', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to($data['to']);
            $message->subject($data['subject']);
        });


      }
    }
}

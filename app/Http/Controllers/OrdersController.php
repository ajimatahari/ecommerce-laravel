<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Session;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // grab all orders
        $orders = Order::orderBy('created_at', 'desc')->paginate(30);
        // return view and pass orders
        return view('admin.orders.index')->withOrders($orders);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // retrive order by id
        $order = Order::find($id);

        // pass order to the view
        return view('admin.orders.show', compact('order'));
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

    public function toggleDelivered($id) {
      // grab message and approve it
      $order = Order::find($id);

      if (!$order->delivered) {
        $order->delivered = 1;
        $order->save();

        // set flash message
        Session::flash('success', 'Order status was marked delivered.');
      } else {
        $order->delivered = 0;
        $order->save();

        // set flash message
        Session::flash('warning', 'Order status marked as undelivered.');
      }

      // redirect user to review page
      return back();
    }
}

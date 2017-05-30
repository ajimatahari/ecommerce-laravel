<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\User;
use DB;
use Auth;
use Session;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = User::find(Auth::user()->id);
      return view('pages.user.address-details', compact('user'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
          'address_line' => 'required',
          'city' => 'required',
          'state' => 'required',
          'post_code' => 'required',
          'country' => 'required',
        ]);

        $address = new Address;
        $address->address_line = $request->address_line;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->post_code = $request->post_code;
        $address->country = $request->country;
        $address->user_id = Auth::user()->id;
        $address->shipping_address = 0;
        $address->billing_address = 0;
        $address->save();

        // set flash message
        Session::flash('success', 'Address created succesfully.');

        //redirect user to address page
        return back();
    }

    public function edit($id) {

      // find address
      $address = Address::find($id);

      // pass the variable to the view
      return view('pages.user.address-edit', compact('address'));
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

      // find the address by id
      $address = Address::find($id);

      // validate
      $this->validate($request, [
        'address_line' => 'required',
        'city' => 'required',
        'state' => 'required',
        'post_code' => 'required',
        'country' => 'required',
      ]);

      $address->address_line = $request->address_line;
      $address->city = $request->city;
      $address->state = $request->state;
      $address->post_code = $request->post_code;
      $address->country = $request->country;
      $address->save();

      // set flash message
      Session::flash('success', 'Address details updated.');

      //redirect user to address page
      return redirect()->route('address.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // grab address
        $address = Address::find($id);

        // delete address
        $address->delete();

        // set flash message
        Session::flash('success', 'The address was deleted');

        // redirect user
        return redirect()->route('address.index');
    }

    public function toggleBillingAddress($id){
      // reset billing
      DB::table('addresses')->update(['billing_address' => 0]);

      // get address
      $address = Address::find($id);

      if ($address->billing_address) {
        $address->billing_address = 0;
      } else {
        $address->billing_address = 1;
        // set flash message
        Session::flash('success', 'The address is now the default billing address.');
      }

      $address->save();
      // redirect user
      return redirect()->route('address.index');
    }

    public function toggleShippingAddress($id){

      // reset shipping
      DB::table('addresses')->update(['shipping_address' => 0]);

      // get address
      $address = Address::find($id);

      if ($address->shipping_address) {
        $address->shipping_address = 0;
      } else {
        $address->shipping_address = 1;
        // set flash message
        Session::flash('success', 'The address is now the default shipping address.');
      }

      $address->save();
      // redirect user
      return redirect()->route('address.index');
    }



}

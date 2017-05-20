<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\User;
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
        //
    }
}

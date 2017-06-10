<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountDetails;
use App\User;
use Auth;
use Session;

class AccountDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get account details
        $details = AccountDetails::where('user_id', Auth::user()->id)->first();

        return view('pages.account-details', compact('details'));
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
      // validate input data
      $this->validate($request, [
        'address_line' => 'nullable',
        'city' => 'nullable',
        'state' => 'nullable',
        'post_code' => 'nullable',
        'country' => 'nullable',
        'holder_name' => 'nullable | max: 50',
        'card_type' => 'nullable | min:4 | max:16',
        'card_number' => 'nullable | min:14 | max:19',
        'card_expiry_date' => 'nullable',
        'card_security_code' => 'nullable | integer | min:3 | max:3'
      ]);

      $details = new AccountDetails;
      $details->user_id = Auth::user()->id;
      $details->address_line = $request->address_line;
      $details->city = $request->city;
      $details->state = $request->state;
      $details->post_code = $request->post_code;
      $details->country = $request->country;
      $details->shipping_address = 1;
      $details->billing_address = 1;

      $details->holder_name = $request->holder_name;
      $details->card_type = $request->card_type;
      $details->card_number = $request->card_number;
      $details->card_expiry_date = date('d y', strtotime($request->card_expiry_date));
      $details->card_security_code = $request->card_security_code;
      $details->default_card = 1;

      $details->save();

      // set flash message
      Session::flash('success', 'Details created succesfully.');

      //redirect user to address page
      return redirect()->route('account-details.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
      // validate input data
      $this->validate($request, [
        'address_line' => 'nullable',
        'city' => 'nullable',
        'state' => 'nullable',
        'post_code' => 'nullable',
        'country' => 'nullable',
        'holder_name' => 'nullable | max: 50',
        'card_type' => 'nullable | min:4 | max:16',
        'card_number' => 'nullable | min:14 | max:19',
        'card_expiry_date' => 'nullable',
        'card_security_code' => 'nullable | integer | min:3 | max:3'
      ]);

      $details = AccountDetails::find($id);
      $details->address_line = $request->address_line;
      $details->city = $request->city;
      $details->state = $request->state;
      $details->post_code = $request->post_code;
      $details->country = $request->country;

      $details->holder_name = $request->holder_name;
      $details->card_type = $request->card_type;
      $details->card_number = $request->card_number;
      $details->card_expiry_date = date('d y', strtotime($request->card_expiry_date));
      $details->card_security_code = $request->card_security_code;

      $details->save();

      // set flash message
      Session::flash('success', 'Details updated succesfully.');

      //redirect user to address page
      return redirect()->route('account-details.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get details
        $details = AccountDetails::find($id);

        // delete details
        $details->delete();

        // set flash message
        Session::flash('success', 'Account details cleared.');

        // redirect user
        return redirect()->route('account-details.index');
    }
}

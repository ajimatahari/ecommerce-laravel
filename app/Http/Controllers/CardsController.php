<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Card;
use Session;
use Auth;
use DB;


class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::find(Auth::user()->id);
        return view('pages.user.payment-details', compact('user'));
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
        // validate
        $this->validate($request, [
          'holder' => 'required',
          'type' => 'required | min:4',
          'number' => 'required | min:14 | max:19',
          'expiry_date' => 'required',
          'security_code' => 'required | integer',
        ]);

        $card = new Card;
        $card->holder = $request->holder;
        $card->type = $request->type;
        $card->number = $request->number;
        $card->expiry_date = date('d y', strtotime($request->expiry_date));
        $card->security_code = $request->security_code;
        $card->user_id = Auth::user()->id;
        $card->default_card = 0;
        $card->save();

        // set flash message
        Session::flash('success', 'Card added succesfully. You can use the new details for further payments.');

        //redirect user to card page
        return redirect()->route('cards.index');
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
      // find card
      $card = Card::find($id);

      // pass the variable to the view
      return view('pages.user.payment-edit', compact('card'));
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
      // find the card by id
      $card = Card::find($id);

      // validate
      $this->validate($request, [
        'holder' => 'required',
        'type' => 'required | min:4',
        'number' => 'required | min:14 | max:19',
        'expiry_date' => 'required',
        'security_code' => 'required | integer',
      ]);

      $card->holder = $request->holder;
      $card->type = $request->type;
      $card->number = $request->number;
      $card->expiry_date = date('d y', strtotime($request->expiry_date));
      $card->security_code = $request->security_code;
      $card->save();

      // set flash message
      Session::flash('success', 'Payment details updated.');

      //redirect user to card page
      return redirect()->route('cards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // grab card
      $card = Card::find($id);

      // delete card
      $card->delete();

      // set flash message
      Session::flash('success', 'The card was deleted.');

      // redirect user
      return redirect()->route('cards.index');
    }

    public function toggleDefaultCard($id) {

        // get card
        $card = Card::find($id);

        if ($card->default_card) {
          $card->default_card = 0;
        } else {
          $card->default_card = 1;
          // set flash message
          Session::flash('success', 'The card is now the default payment option.');
        }

        $card->save();
        
        // redirect user
        return redirect()->route('cards.index');
    }
}

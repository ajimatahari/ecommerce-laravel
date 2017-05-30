<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class UsersController extends Controller
{
    //

    public function index() {
      // grab all Users
      $users = User::paginate(20);

      // pass users to the view
      return view('admin.users.index')->withUsers($users);
    }


    public function destroy($id) {
      // retrieve user by id
      $user = User::find($id);

      // delete user
      $user->delete();

      // send confirmation message
      Session::flash('success', 'The user ' . $user->email . ' was removed succesfully.');

      // redirect to user index
      return redirect()->route('users.index');
    }
}

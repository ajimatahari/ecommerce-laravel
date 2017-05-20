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
      $users = User::all();

      // pass users to the view
      return view('admin.users.index')->withUsers($users);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{


    public function index() {
        // grab messages
        $messages = Message::all();

        // pass message to the view
        return view('admin.messages.index', compact('messages'));
    }

    public function show($id) {

        // grab message by id
        $message = Message::find($id);

        // pass message to the view
        return view('admin.messages.show', compact('message'));
    }


}

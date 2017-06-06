<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Mail;
use Session;

class MessagesController extends Controller
{


    public function index() {
        // grab messages
        $messages = Message::paginate(20);

        // pass message to the view
        return view('admin.messages.index', compact('messages'));
    }

    public function show($id) {

        // grab message by id
        $message = Message::find($id);

        // pass message to the view
        return view('admin.messages.show', compact('message'));
    }

    public function reply(Request $request, $id) {

      // get message
      $original = Message::find($id);

      // validate data
      $this->validate($request, [
          'reply' => 'required | min:5 | max:5000'
      ]);

      // send message reply by email
      $fields = [
        'name' => 'Company name',
        'email'=> 'andrei.hribanas@gmail.com',
        'subject' => $request->subject,
        'to' =>  $request->from,
        'content' => $request->reply,
      ];

      // send order confirmation mail
      Mail::send('emails.message_reply', $fields, function($message) use ($fields) {
          $message->from($fields['email']);
          $message->to($fields['to']);
          $message->subject($fields['subject']);
      });

    // set flash message
    Session::flash('success', 'Reply sent to ' . $request->from);

    // redirect user to messages
    return redirect()->route('messages.index');

    }

}

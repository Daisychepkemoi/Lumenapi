<?php

namespace App\Http\Controllers;
use App\Message;
class MessagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  public function create($id)
    {
        $name = User::where('id',$id)->pluck('name');
    	$message = new Message;
        $message->type= $request->type;
        $message->subject = $request->subject;
        $message->body = $request->body;
        $message->sender = $name;
        $message->recipient = $request->recipient;
        $message->save();
        return response()->json($message);
        
    }
    
}

   


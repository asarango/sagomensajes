<?php

namespace App\Http\Controllers;

use App\Http\Process\Message\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    
    public function unread($toUsername, Request $request){
        $message = new Message();
        $messages = $message->get_unread($toUsername);
        
        return response()->json($messages, 200);
    }


    public function detail($id, Request $request){
        $mess = new Message();
        $message = $mess->get_message_id($id);

        return response()->json($message, 200);
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::latest()->paginate(10);
        return view('admin.messages.index',[
            'messages' => $messages,
        ]);
    }

    public function show($slug){
        $message = Message::where('slug',$slug)->first();

        return view('admin.messages.message-details',[
            'message' => $message
        ]);
    }
}

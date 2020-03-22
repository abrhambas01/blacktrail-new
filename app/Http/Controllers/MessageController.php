<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ; 
use App\Message ; 
use App\Criminal ; 
class MessageController extends Controller
{
	/*
==>
	 Send message
	<==
	*/
	public function sendMessage($user,$criminal)
	{

		$message = Message::where([
			['sender_id','=', auth()->id()],
			['receiver_id', '=',$user]
		])->get();

		$criminal = Criminal::where('id','=',$criminal)->get();
		return view('messages',compact("message",'criminal'));
	}
}

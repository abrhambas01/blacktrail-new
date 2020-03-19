<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ; 
use App\Message ; 
class MessageController extends Controller
{

	/**/
	public function sendMessage($user)
	{

		$message = Message::where([
			['from_id','=', auth()->id()],
			['to_id', '=',2]
		])->get();
		
		return view('messages',compact("message"));
	}
}

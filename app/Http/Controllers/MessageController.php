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

		$criminal = Criminal::where('id','=',$criminal)->with('respondent')->get();

		return view('messages',compact("message",'criminal'));
	}

	public function getUserNotifications()
	{
		$notifications = Message::where("read",0)
		->where("receiver_id",$request->user()->id)
		->orderBy('created_at','desc')
		->get(); 

		return response(['data' => $notifications], 200);
	}

	public function getMessages($id){
		$ms =  Message::where('receiver_id',$id)
		->orderBy('created_at','desc')
		->get();

		return response(['data' => $ms], 200);
	}


	public function getMessageById(Request $request){
		
		$msgs = Message::where('id', $request->input('id'))->first();

		if ( $msgs->read == 0 ){
			$msgs->read = 1 ;
			$msgs->save();
		}

		return response(['data' => $msgs], 200);

	}


	public function saveNewMessage(Request $request)
	{
		$attributes = [
			'sender_id' => $request->user()->id,
			'receiver_id' => $request->input('receiver_id'),
			'message' => $request->input('message'),
			'subject' => $request->input('subject'),
			'read' => 0,
		];

		$pm = Message::create($attributes);
		$data = Message::where('id', $pm->id)->first();

	/*	
	$redis = LRedis::connection();
		$redis->publish('message', $data);
*/
		return response(['data' => $data], 201);
		
	}


	public function getMessageSent(Request $request)
	{
		$pms = Message::where('sender_id', $request->user()->id)->orderBy('created_at', 'desc')
		->get();
		
		return response(['data' => $pms], 200);
	}

}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User ; 
use App\Message ; 
use App\Criminal ; 
use DB;

class MessageController extends Controller
{
	/*
==>
	 Send message
	<==
	*/
	public function sendMessage($user,$criminal)
	{
		/*
		$message = Message::where([
		['sender_id','=', auth()->id()],
		['receiver_id', '=',$user]
		])->get();
		*/

	// = User::where("username",'=',$user)->pluck('id');

		$receiver_id = DB::table('users')
		->where('username','=',$user)
		->value('id');

		$messages = Message::where([
			'sender_id' => auth()->user()->id,
			'receiver_id' => $receiver_id])
		->orWhere('sender_id', $receiver_id)
		->where('receiver_id', auth()->user()->id)
		->where('criminal_id',$criminal)
		->orderBy('id','=','asc')
		->get();

		$criminal = Criminal::where('id','=',$criminal)->with('respondent')->get();
		return view('messages',compact("messages",'criminal'));
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
		// return response()->json(request()->all());
		dd(request()->all());
		

		$message = new Message();

		$receiver = request()->input("receiver.id");

		if ($request->has('receiver') && $request->input('receiver')){
			$receiver_id = (int)$request->input('receiver.id');
			$message->sender_id = auth()->id() ; 			
			$message->message = $request->input('content', '');
			$message->receiver_id = $receiver_id ;
			$message->criminal_id = request()->input('criminal.id') ;	
			$message->seen_at = NULL  ; 
			$message->read = 0 ;
			$message->save();  
				// $message->room = $message->sender < $receiver ? $message->sender.'__'.$receiver : $receiver.'__'.$message->sender;
		}
		else {
			dd("Make sure you have a receiver");
		}

		$message->save();

    	broadcast(new MessageSent($receiver, $request->input('content')))->toOthers(); // send to others EXCEPT user who sent this message
    	
    	return response()->json(['message' => $message->load(['sender', 'reactions.user'])]);

    }


    public function getMessageSent(Request $request)
    {
    	$pms = Message::where('sender_id', $request->user()->id)->orderBy('created_at', 'desc')
    	->get();

    	return response(['data' => $pms], 200);
    }

}

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User ; 
use App\Criminal ; 
class ChatController extends Controller
{
	
	public function __construct(){
		return $this->middleware('auth');
	}

	public function send_chat($criminal_id){
		$id = request()->get("criminal_id");
		$user = Criminal::where('id','=',$criminal_id)->with('respondent')->get();
		return view('chat',compact('user'));
		// return response()->json(['user' => $user]);		
	}

	public function fetch_respondent(){
		$id = request()->get("criminal_id");
		$criminal_poster = Criminal::where('criminal_id','=',$criminal_id)->pluck('posted_by');
		dd($criminal_poster);
	// return view('chat',compact('user'));
		// return response()->json(['user' => $user]);		
	}

	public function index()
	{
		return view('chat');
	}

	public function testMessage()
	{
			/*$receiver_id = DB::table('users')
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

			$criminal = \App\Criminal::where('id','=',$criminal)->with('respondent')->get();*/

			$criminalId = 3 ;
			
			$criminal = \App\Criminal::where('id','=',$criminalId)->with('respondent')->get();

			return view("test-message",compact("criminal"));

	}

	public function sendChat(Request $request){
		$user = User::find(request('id')); 
		$message = $request->message; 
		event(new \App\Events\MessageSent($user,$message));				
	}

// dd($user);

/*

$message = Message::forceCreate([
	'receiver_id' => \App\User::admins()->get()->random()->id,
	'sender_id' =>  DB::table('users')->where('role_id',3)->get()->random()->id,
	'criminal_id' => \App\Criminal::get()->random()->id,
	'message' => $faker->realText,
	'seen_at' => $faker->dateTime,
	'read' => 0
]);

	event(new MessageSent($message));
	
	return view("messages.chat",[
		'users' => $this->user
	]);
*/
}

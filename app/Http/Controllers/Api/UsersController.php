<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Criminal ;
use App\User ; 	
use Hash ;
use Validator; 
use Storage ; 
use \Image ; 	
use Illuminate\Validation\Rule;
use DB ; 
use App\Http\Requests\CreateProfileRequest; 
use App\Http\Requests\UpdateProfileRequest; 

class UsersController extends Controller
{

// this is awesome..
	public function getAllCommonUsers(){
		$criminal = User::admins()->get();
		return response()->json($criminal);
	}

	/*delete user*/
	public function delete_user(){
		$user_id = intval(request('user_id'));
		$user = Criminal::find($user_id)->delete();
		return response()->json($user);
	}

	public function activate_user(){
		$user_id = intval(request('user_id'));

		DB::table('users')->where('id', '=', $user_id)->update(['status' => '1']);	

		$user = DB::table("users")->where('id','=',$user_id)->get();

		Mail::to($user->email)->send(new UserActivated($user));
		return response()->json($user);
	}

	public function updateUser(Request $request,$id)
	{
		$validator = Validator::make($request->input('form'), [
			'display_name' => 'required|min:3|max:100',
			'username' => 'required|unique:users|min:4|max:15',
			'email' 	   => 'required|email|unique:users',
			'phone_number' => 'required|min:3',
			'password' 	   => 'min:6',
			'country_id' => 'required|integer',
			'avatar' => 'required'
		]);

		if(request()->has('form.avatar')){
			$base64String = request()->input('form.avatar') ; 
			$image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '',$base64String));
			$imageName = str_random(30) . '.png';
			$imageStore = Storage::disk('public')->put($imageName, $image, 'public'); 

			$userData = [
				'display_name'  => $request->input("form.display_name"),
				'username'	 	=> $request->input("form.username"),
				'email' 		=> $request->input("form.email"),
				'phone_number'  => $request->input("form.phone_number"),
				'password' 		=> bcrypt($request->input("form.password")),
				'country_id' 	=> $request->input("form.country_id"),
				'avatar' 		=> $imageName
			];

			$user = User::findOrFail($id);
			$user->update($userData);
			
			if ($user){ 
				return response("User with avatar Updated",201);	
			}
			else { 
				return response("Didn't update",500);	
			}
		}
		else {
			$userData = [
				'display_name'  => $request->input("form.display_name"),
				'username'	 	=> $request->input("form.username"),
				'email' 		=> $request->input("form.email"),
				'phone_number'  => $request->input("form.phone_number"),
				'password' 		=> bcrypt($request->input("form.password")),
				'country_id' 	=> $request->input("form.country_id"),
			];

			$user = User::findOrFail($id);

			$user->update($userData);

			if ($user){ 
				return response("Updated",201);	
			}
			else { 
				return response("Didn't update",200);	
			}
		}
		
	}	

	public function update_profile_of_the_user(Request $request)
	{	
// the id of the user
		$id = request()->input('form.id');
		$user = User::where('id',$id)->pluck('password');
		$logged_on_users_password = $user[0];
		$password = request()->input('form.password');
		$confirm_password = request()->input('form.confirm_password');

/*if the two passwords don't match then issue a response*/
		

		if (is_null($password) || is_null($confirm_password)) {
			$this->updateUser(request(),$id);
		}


		if ( $password !=  $confirm_password) {
			return response()->json(['error' => 'Your Passwords do not match, try to fix it out'], 401);
		}
// if the passwords are the same 
		else { 
			if(Hash::check($password, $logged_on_users_password)) {
				return response()->json(['error' => 'Try to input a different password since you have the same inputted password'], 401);
			}
			else { 
				$this->updateUser(request(),$id);
			}
		}
	}
}

/*	
'first_name'        
'middle_name'        =>             $request->input("form.middle_name"),
'last_name'          =>             $request->input("form.last_name"),
'contact_number'     =>             $request->input("form.contact_number"),
'contact_person'     =>             $request->input("form.contact_person"),
'alias'              =>             $request->input("form.alias"),
'country_id'         =>             $request->input("form.country_id"),
'posted_by'          =>             $request->input("form.posted_by"),
'status'             =>             $request->input("form.status"),
'photo'             =>             $imageName,
];


// return response($imageStore,201);*/

/*
}

// return response(request()->all());

}
}
}

if ($validator->fails()) {
	dd("validator fails");
	return redirect()->back()->withErrors($validator)->withInput();
}
else { 

}
/*
/*	else { 
	return response()->json(['error' => 'Your Password is incorrect and does not match with the current logged on user, try to fix it out'], 401);
}*/
// Storage::disk('public')->delete(auth()->user()->getOriginal('avatar'));	
/*
auth()->user()->update([
'username' => request()->input('form.username'),
'email' => request()->input('form.email'),
'display_name' => request()->input('form.username'),
'phone_number' =>  request()->input('form.phone_number'),
'country_id' =>  request()->input('form.country_id'),
'avatar' => $name,
])->where("id",$id);
*/






// then start validating
/*request()->validate([
'avatar' => ['nullable', 'image', Rule::dimensions()->minWidth(400)->ratio(8.5/11)],
'display_name' => 'required|min:3|max:100',
'role_id' 	   => 'required|integer',
'username' => 'required|unique:users|min:4|max:15',
'email' 	   => 'required|email|unique:users',
'phone_number' => 'required|min:3',
'password' 	   => 'required|min:6',
'country_id' => 'required|integer'
]);*/




/*	request()->validate([
'avatar' => 'required|image',
'form.display_name' => 'required|min:3|max:100',
'form.role_id' 	   => 'required|integer',
'form.username' => 'required|unique:users|min:4|max:15',
'form.email' 	   => 'required|email|unique:users',
'form.phone_number' => 'required|min:3',
'form.password' 	   => 'required|min:6',
'form.country_id' => 'required|integer'
]);*/


// return response()->json(request()->input('form.username'));

// 2. if the password matches to the ones of the logged on user start valiadting	



/*$this->validate(request(),[
'form.display_name' => 'required|min:3|max:100',
'form.role_id' 	   => 'required|integer',
'form.username' => 'required|unique:users|min:4|max:15',
'form.email' 	   => 'required|email|unique:users',
'form.phone_number' => 'required|min:3',
'form.password' 	   => 'required|min:6',
'form.country_id' => 'required|integer'
]);*/


/*		
$user = User::findOrFail($id);

$user->update([
'display_name'       => request('form.display_name'),
'role_id'   		 => request('form.role_id'),
'email'    			 => request('form.email'),
'password'    			 => request('form.password'),
''
]);
*/

// return response()->json(request()->get('form.display_name'));
/*	$image = request()->get('params[0].form.display_name');
dd($image);*/

/*
$this->validate(request(), [
'image' => 'required'
]);
*/


/*
if($request->get('image'))
{
$image = $request->get('image');
$name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
\Image::make($request->get('image'))->save(public_path('images/').$name);
}

$image= new FileUpload();
$image->image_name = $name;
$image->save();

return response()->json(['success' => 'You have successfully uploaded an image'], 200);

return response()->json(request());*/

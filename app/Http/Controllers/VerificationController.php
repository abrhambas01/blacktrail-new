<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User  ;

class VerificationController extends Controller
{

	public function confirm_email($token){
		$user = User::findOrFailByToken($token);
		
		$user->confirm();

		return redirect()->route('login')->with(['confirmation_success_message' => 'You can now login with those credentials...']);
		
		/*
		DB::table('users')->where('id', $user)->update([
			'confirmed_at' => Carbon::now(),
			'confirmation_code' => null	
		]);
		*/
			/*try
			 {
				DB::table('users')->where('email', $email)->update([
					'confirmed_at' => Carbon::now(),
					'confirmation_code' => null	
				]);
				return redirect()->route('registrationSuccess');
			} catch(VerifyAccountException $verify){
				return response([],503);
			}		
		*/
	}

	public function userActivated(){
		
	}



}

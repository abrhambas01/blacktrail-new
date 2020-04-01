<?php 
namespace App\Http\ViewComposers;
use App\Country ; 
use Illuminate\View\View;

class All { 

	public function compose(View $view)
	{
		if (auth()->check()){
			$displayName = auth()->user()->display_name ;
			$str = asset('/storage/'.auth()->user()->avatar)  ; 
			$avatar = str_replace('\\', '/', $str);
			$user_id = auth()->user()->id ; 
		}
		
		else {
			$displayName = '';
			$str = asset('/storage/default_avatar.jpg')  ; 
			$avatar = str_replace('\\', '/', $str);
			$user_id = null;
		}
		
		$view->with([
					'displayName'	=> $displayName ,
					'user_id'	=>  $user_id,
					'avatar' => $avatar
		]);	
	
	}
}

<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!

*/
Route::group(['prefix' => 'v1'], function(){
		
	Route::post("/attachments","TrixAttachmentController@store");

	Route::delete("/attachments/{url}","TrixAttachmentController@destroyAttachment");	

	Route::get('/groups', 'GroupsController@getAll');
	
	Route::get("/convert/currency/usd","CurrencyController@convert_currency_to_usd");
	
	/*retrieving respondent of the criminal's information*/
	Route::get("/respondent/criminal","Api\CriminalsController@fetch_respondent");
	
	Route::get("/respond/criminal/{criminal}","ChatController@send_chat");

	/*Fetching the messages of the current logged on user to the fetched user*/
	Route::get('/messages/get','Api\MessagesController@fetch_all_messages_of_the_currently_logged_on_user_to_a_its_respondent');

	// Route::post('/messages/post','Api\MessagesController@send_message');

	Route::put('user/profiles/update','Api\UsersController@update_profile_of_the_user');

	/*patching and deleting.*/
	Route::patch("/user/activate","Api\UsersController@activate_user");
	
	Route::delete("/user/delete","Api\UsersController@delete_user");
	
	Route::get('/criminals/{criminal}', 'Api\CriminalsController@getById')->name("criminals.info.get");

	Route::get('/currencies', 'Api\CountriesController@getAllCurrencies')->name("currencies");
	
	Route::put("bounty/add","Api\BountyController@updateCriminalBounty")->name("bounty.update");
	
	Route::put("bounty/update/fixer","Api\BountyController@convertCurrencyUsingFixer")->name("bounty.update.fixer");

	// Route::put("bounty/update","Api\BountyController@convertCurrencyUsingCurrencyLayerApi")->name("bounty.update.currency");

	Route::put("/update/bounty","Api\BountyController@update_the_bounty_of_the_criminal");
	// Route::get("test/update",'Api\BountyController@update_the_bounty_of_the_criminal');

/*	
	Route::get('/schools/student/{student}','Api\SchoolsController@getAllSchoolsByAStudent')->name("schools.student");
*/

	Route::get('/messages/{user}',"Api\ContactsController@getMessagesFor");

	// Route::get('user-list', 'Api\UsersController@getUserList');

	/*Chat urls*/
	Route::post('get-user-conversation', 'ChatController@getUserConversationById');

	/*Send Chat..*/
	Route::post("postMessage", 'MessageController@saveNewMessage')->name('sendMessageEndpoint');

	/*Private Message urls*/
	Route::post('get-private-message-notifications', 'MessageController@getUserNotifications');
	Route::post('get-private-messages', 'MessageController@getMessages');
	Route::post('get-private-message', 'MessageController@getPrivateMessageById');
	Route::post('get-private-messages-sent', 'MessageController@getPrivateMessageSent');

	/*Search for a criminal by sorting them out*/

	Route::get("criminals/search","SearchController@searchForACriminal")->name("criminals.search");	

/*
Route::get('criminals/search/sortBy={id}&country={id}',"SearchController@searchForACriminal")->name("search.criminals");*/



});

/*
routes are now api/payment/excute
*/
Route::post('payment/create',"PaypalController@create_payment");
Route::post('payment/execute',"PaypalController@execute_payment");	




// Route::post('forgot-password', 'UserController@forgotPassword');
// Route::post('reset-password', 'UserController@resetPassword');

Route::get('/user', function (Request $request) {
	return $request->user();
})->middleware('auth:api');

/*Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
  
});*/
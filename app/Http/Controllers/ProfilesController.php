<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DateTime ; 
use Faker\Generator as Faker ;
use Carbon\Carbon ;  
use App\User ;
use \Paypal\Rest\ApiContext ; 
use Auth ;
// use BeyondCode\Larave
/*used for reviewing algorithms 
and function
*/
class ProfilesController extends Controller
{

	/*Used for displaying the profile of the user.
	*/
	public function index(User $user)
	{
		$profileUser = User::where('id',auth()->id())->with('country')->get();
		// $profileUser = auth()->user()->with('country')->get();
		return view('profiles.home', [ 'profileUser' => $profileUser]);
	}

	public function updateProfileView()
	{	
		return view('profiles.update');
	}	

	public function updateProfile()
	{	
		return response()->json(request()->all());
	}	

	
	public function billing()
	{	
		return view('profiles.billing');
	}	

	public function store_billing_profile()
	{	
		dd(request()->all());	
		// i'm getting request() data/

		// client_id, secret_key from paypal

		// step 2
		new ApiContext(new \PayPal\Auth\OAuthTokenCredential(env('PAYPAL_CLIENT_ID'),  env('PAYPAL_SECRET')));

		$payer = new \PayPal\Api\Payer();
		
		$payer->setPaymentMethod('paypal');

		$amount = new \PayPal\Api\Amount();
		$amount->setTotal('1.00');
		$amount->setCurrency('USD');

		$transaction = new \PayPal\Api\Transaction();
		$transaction->setAmount($amount);

		$redirectUrls = new \PayPal\Api\RedirectUrls();
		$redirectUrls->setReturnUrl("https://example.com/your_redirect_url.html")
		->setCancelUrl("https://example.com/your_cancel_url.html");

		$payment = new \PayPal\Api\Payment();
		$payment->setIntent('sale')
		->setPayer($payer)
		->setTransactions(array($transaction))
		->setRedirectUrls($redirectUrls);
		// After Step 3
		try {
			$payment->create($apiContext);
			echo $payment;

			echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
		}
		catch (\PayPal\Exception\PayPalConnectionException $ex) {
			    // This will print the detailed information on the exception.
			    //REALLY HELPFUL FOR DEBUGGING
			echo $ex->getData();
		}
	}	
}
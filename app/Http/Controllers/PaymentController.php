<?php

namespace App\Http\Controllers;

use Stripe;
use Notification;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
     public function paymentPost(Request $request){
	       
	Stripe\Stripe::setApiKey('sk_test_51OKZymK9fpKmv0uXBELZLQVxDox8xhzxIm77CUsvtDeZhvk5cgpKd4Cr5z0b67H9OY0eQwhS9xlAcwUdkK5sh9MT00XjGgGqK5');
        Stripe\Charge::create ([
                "amount" => $request->sub*100,   // RM10  10=10 cen 10*100=1000 cen
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of southern online",
        ]);

        $email = 'happypoh13@gmail.com';
        Notification::route('mail', $email)->notify(new \App\Notifications\orderPaid($email));
           
        return back();
    }
}
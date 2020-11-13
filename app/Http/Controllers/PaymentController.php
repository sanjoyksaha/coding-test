<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.monthly-payment');
    }

    public function createPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        Charge::create ([
            "amount" => 1000,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from coding test"
        ]);

        return redirect('/home')->with([
            'success' => 'Payment Added Successfully. Your account valid till '.date("d-m-Y", strtotime("+30 days")),
        ]);
    }
}

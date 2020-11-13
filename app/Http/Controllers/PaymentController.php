<?php

namespace App\Http\Controllers;

use App\Model\PaymentInfo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
//        dd($request->all());
        // For Stripe Payment
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        Charge::create ([
            "amount" => 1000,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from coding test"
        ]);

        $data = [
            'user_id' => Auth::user()->id,
            'card_number' => $request->card_number,
            'cvc' => $request->cvc,
            'card_expiration_month' => $request->card_expiration_month,
            'card_expiration_year' => $request->card_expiration_year,
            'amount' => 10.00,
            'deactivated_at' => date("Y-m-d", strtotime("+30 days")),
        ];

        // Insert into payment information table
        PaymentInfo::create($data);

        // Update user status
        User::where('id', Auth::user()->id)->update(['status' => 1]);

        return redirect('/home')->with([
            'success' => 'Payment Added Successfully. Your account valid till '. date("d-m-Y", strtotime("+30 days")) ,
        ]);
    }
}

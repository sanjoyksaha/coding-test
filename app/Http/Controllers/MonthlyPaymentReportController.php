<?php

namespace App\Http\Controllers;

use App\Model\PaymentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonthlyPaymentReportController extends Controller
{
    public function monthlyPaymentReport()
    {
        $authenticate_user_monthly_reports = PaymentInfo::with('user')->where('user_id', Auth::user()->id)->get();

        return view('payment.monthly-payment-report', compact('authenticate_user_monthly_reports'));
    }

}

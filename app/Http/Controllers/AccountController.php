<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function payments()
    {
        $payments = Payment::with('user')->get();
        return view('backpanel.account.payments',compact('payments'));
    }

    public function payment_view($id)
    {
        $payment = Payment::find($id);
        return view('backpanel.account.payment-view',compact('payment'));
    }
}

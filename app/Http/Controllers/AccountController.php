<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AccountController extends BaseAccountController
{
    public function payments()
    {
        $payments = Payment::with('user')->latest()->get();
        return view('backpanel.account.payments',compact('payments'));
    }

    public function payment_view($id)
    {
        $payment = Payment::find($id);
        return view('backpanel.account.payment-view',compact('payment'));
    }

    public function transactions()
    {
        $transactions = Transaction::query();
        if (request()->has('from_date') && request()->has('to_date') && request()->from_date != '' && request()->to_date != '') {
            $transactions->whereDate('date', '>=', request()->from_date)->whereDate('date', '<=', request()->to_date);
        }else{
            $transactions->take(10);
        }
        $transactions = $transactions->latest()->get();
        return view('backpanel.account.transactions',compact('transactions'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BaseAccountController extends Controller
{

    public function bankAccountBalance($account, $amount = 0.00, $type = 'credit', $reference_id, $reference, $reason, $transfer = true , $date = null,  $status = 1)
    {
        if ($date == null) {
            $date = now()->toDateString();
        }
        $bankAccount = BankAccount::find($account);
        if ($bankAccount) {
            if ($type == 'credit') {
                $oldBalance                   = (float)$bankAccount->opening_balance;
                $bankAccount->opening_balance = $oldBalance + (float)$amount;
            } elseif ($type == 'debit') {
                $oldBalance                   = (float)$bankAccount->opening_balance;
                $bankAccount->opening_balance = $oldBalance - (float)$amount;
            }
            $bankAccount->save();
        }
        if($transfer == false){
            return true;
        }
        Transaction::create([
            'reference_id' => $reference_id,
            'reference_type' => $reference,
            'reason' => $reason,
            'date' => $date,
            'type' => $type,
            'bank_account_id' => $account,
            'amount' => $amount,
            'status' => $status
        ]);
        return true;
    }
}

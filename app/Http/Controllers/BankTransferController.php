<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\BankTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BankTransferController extends BaseAccountController
{
    public function index()
    {
        $transfers = BankTransfer::query();
        if (request()->has('from_date') && request()->has('to_date') && request()->from_date != '' && request()->to_date != '') {
            $transfers->whereDate('date', '>=', request()->from_date)->whereDate('date', '<=', request()->to_date);
        }
        if (request()->has('f_account')) {
            $transfers->where('from_account', request()->f_account);
        }
        if (request()->has('t_account')) {
            $transfers->where('to_account', request()->t_account);
        }
        $transfers = $transfers->latest()->get();
        $bankAccounts = BankAccount::select('id', 'bank_name', 'account_number')->latest()->get();
        return view('backpanel.account.bank-transfer', compact('transfers','bankAccounts'));
    }

    public function create()
    {
        $bankAccounts = BankAccount::select('id', 'bank_name', 'account_number')->latest()->get();
        return view('backpanel.account.create-transfer', compact('bankAccounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'from_account' => 'required|numeric',
            'to_account' => 'required|numeric',
            'amount' => 'required|numeric',
            'date' => 'required',
        ]);
        if ($request->has('id')) {
            $transfer             = BankTransfer::find($request->id);
            $this->bankAccountBalance($transfer->from_account, (float) $transfer->amount, 'credit', $transfer->id, get_class($transfer), 'Bank Transfer',false);
            $this->bankAccountBalance($transfer->to_account, (float) $transfer->amount, 'debit', $transfer->id, get_class($transfer), 'Bank Transfer',false);
            $request->session()->flash('success', 'Bank Transfer Updated!');
        } else {
            $transfer             = new BankTransfer();
            $request->session()->flash('success', 'Bank Transfered Successfully!');
        }
        $transfer->from_account   = $request->from_account;
        $transfer->to_account     = $request->to_account;
        $transfer->amount         = $request->amount;
        $transfer->date           = $request->date;
        $transfer->payment_method = 0;
        $transfer->reference      = $request->reference;
        $transfer->description    = $request->description;
        $transfer->created_by     = auth('admin')->id();
        $transfer->save();
        $this->bankAccountBalance($request->from_account, (float) $request->amount, 'debit', $transfer->id, get_class($transfer), 'Bank Transfer');
        $this->bankAccountBalance($request->to_account, (float) $request->amount, 'credit', $transfer->id, get_class($transfer), 'Bank Transfer');
        return redirect()->route('admin.account.bank-transfer.index');
    }

    public function edit($id)
    {
        $edit = BankTransfer::find($id);
        $bankAccounts = BankAccount::select('id', 'bank_name', 'account_number')->latest()->get();
        return view('backpanel.account.create-transfer', compact('bankAccounts', 'edit'));
    }

    public function destroy($id)
    {
        $transfer = BankTransfer::find($id);
        $transfer->delete();
        $this->bankAccountBalance($transfer->from_account, (float) $transfer->amount, 'credit', $transfer->id, get_class($transfer), 'Bank Transfer Delete');
        $this->bankAccountBalance($transfer->to_account, (float) $transfer->amount, 'debit', $transfer->id, get_class($transfer), 'Bank Transfer Delete');
        request()->session()->flash('success', 'Transfer Deleted!');
        return redirect()->back();
    }
}

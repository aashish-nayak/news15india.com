<?php

namespace App\Http\Controllers;

use App\Events\TransactionEvent;
use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function index()
    {
        $bankAccounts = BankAccount::latest()->get();
        return view('backpanel.account.banking',compact('bankAccounts'));
    }

    public function create()
    {
        return view('backpanel.account.create-account');
    }

    public function store(Request $request)
    {
        $request->validate([
            'holder_name' => 'required',
            'bank_name' => 'required',
            'account_number' => 'required',
            'opening_balance' => 'required',
            'contact_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
        ]);
        $data = $request->except('_token');
        $data['created_by'] = auth('admin')->id();
        if($request->has('id')){
            $account = BankAccount::find($data['id']);
            $message = 'Bank Account Updated Successfully!';
        }else{
            $account = new BankAccount();
            $message = 'Bank Account Created Successfully!';
        }
        $account->fill($data);
        $account->save();
        event (new TransactionEvent($account->id,get_class($account),'New Account Added',$account->id,now()->toDateString(),'credit',(float)$data['opening_balance'],1));
        $request->session()->flash('success',$message);
        return redirect()->route('admin.account.banking');
    }

    public function edit($id)
    {
        $edit = BankAccount::find($id);
        return view('backpanel.account.create-account',compact('edit'));
    }

    public function destroy($id)
    {
        BankAccount::find($id)->delete();
        request()->session()->flash('success','Bank Account Delete Successfully!');
        return redirect()->back();
    }
}

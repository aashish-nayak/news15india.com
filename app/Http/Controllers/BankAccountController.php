<?php

namespace App\Http\Controllers;

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
            BankAccount::find($data['id'])->update($data);
            $message = 'Bank Account Updated Successfully!';
        }else{
            BankAccount::create($data);
            $message = 'Bank Account Created Successfully!';
        }
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

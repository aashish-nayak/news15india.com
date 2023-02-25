<?php

namespace App\Http\Controllers;

use App\Models\AccountCategory;
use App\Models\BankAccount;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::latest()->get();
        return view('backpanel.account.expenses',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bankAccounts = BankAccount::select('id', 'bank_name', 'account_number')->latest()->get();
        $categories = AccountCategory::select('id','name')->get();
        return view('backpanel.account.create-expense', compact('bankAccounts','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('id')){
            $expense = Expense::findOrFail($request->id);
            $request->session()->flash('success', 'Expense Updated!');
            $this->bankAccountBalance($expense->bank_account_id, $expense->amount, 'credit');
            $this->bankAccountBalance($request->bank_account, $request->amount, 'debit');
        }else{
            $expense = new Expense();
            $request->session()->flash('success', 'Expense Added!');
            $this->bankAccountBalance($request->bank_account, $request->amount, 'debit');
        }
        $expense->item_name = $request->item_name;
        $expense->bank_account_id = $request->bank_account;
        $expense->amount = $request->amount;
        $expense->date = $request->date;
        $expense->account_category_id = $request->account_category_id;
        $expense->description = $request->description;
        if($request->hasFile('receipt')){
            if($request->has('id') && Storage::exists('public/accounting/' . $expense->receipt)){
                Storage::delete('public/accounting/' . $expense->receipt);
            }
            $file = $request->file('receipt');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename =  'receipt___'.  time() . '.' . $extension;
            $file->storeAs('public/accounting', $filename);
            $expense->receipt = $filename;
        }
        $expense->save();
        return redirect()->route('admin.account.expenses.index');
    }
    public function bankAccountBalance($id, $amount, $type)
    {
        $bankAccount = BankAccount::find($id);
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
        return true;
    }
    public function categoryStore(Request $request)
    {
        $cat = AccountCategory::create($request->all());
        return response()->json($cat);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Expense::findOrFail($id);
        $bankAccounts = BankAccount::select('id', 'bank_name', 'account_number')->latest()->get();
        $categories = AccountCategory::select('id','name')->get();
        return view('backpanel.account.create-expense', compact('bankAccounts','categories','edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $this->bankAccountBalance($expense->bank_account_id, $expense->amount, 'credit');
        $expense->delete();
        request()->session()->flash('success','Expense Deleted!');
        return redirect()->back();
    }
}

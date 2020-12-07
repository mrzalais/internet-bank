<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request, Account $account)
    {
        $request->validate([
            'from_user_id' => 'required',
            'to_user_id' => 'required',
            'amount' => 'required|integer|min:1'
        ]);

        $accountA = Account::where('name', $request['from_user_id'])->first();
        $accountB = Account::where('name', $request['to_user_id'])->first();
        $cents = $request['amount'];

        $accountA->withdraw($cents);
        $accountB->deposit($cents);

        $this->update($accountA, $accountB, $cents);

        $transaction = (new Transaction)->fill($request->all());

        $transaction->save();

        return redirect()->route('accounts.index');
    }

    public function update(Account $accountA, Account $accountB, int $cents)
    {
        $accountA->decrement('balance', $cents);
        $accountB->increment('balance', $cents);
    }
}

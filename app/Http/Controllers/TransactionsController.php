<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Rate;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request, Account $account)
    {
        $accountA = Account::where('name', $request['from_user_account_id'])->first();
        $accountB = Account::where('name', $request['to_user_account_id'])->first();

        if ($accountB->currency_type !== "EUR") {
            return redirect('transactions/create')->with('status', "This account's currency is not EUR");
        }

        $rate = Rate::where('rate_id', $accountA->currency_type)->first();

        $request->validate([
            'from_user_account_id' => 'required',
            'to_user_account_id' => 'required',
            'amount' => 'required|integer|min:1'
        ]);


        $cents = $request['amount'];

        $this->update($accountA, $accountB, $cents, $rate->rate);

        $transaction = (new Transaction)->fill($request->all());

        $transaction->save();

        return redirect()->route('accounts.index');
    }

    public function update(Account $accountA, Account $accountB, int $cents, float $rate)
    {
        $accountA->decrement('balance', $cents);
        $accountB->increment('balance', $cents / $rate);
    }

    public function destroy(Transaction $transaction): RedirectResponse
    {
        $transaction->delete();

        return redirect()->route('accounts.index');
    }
}

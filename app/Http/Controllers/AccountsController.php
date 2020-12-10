<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index(): view
    {
        $accounts = auth()->user()->accounts;

        $sentTransactions = auth()->user()->sentTransactions;
        $receivedTransactions = auth()->user()->receivedTransactions;

        foreach($accounts as $account)
        {
            $s = Transaction::where('from_user_id', $account->name)->get();
            $r = Transaction::where('to_user_id', $account->name)->get();

            if ($s->count() !== 0) {
                $sentTransactions = $s;
            }
            if ($r->count() !== 0) {
                $receivedTransactions = $r;
            }
        }

        return view('accounts.index', [
            'user' => auth()->user(),
            'accounts' => auth()->user()->accounts,
            'sentTransactions' => $sentTransactions,
            'receivedTransactions' => $receivedTransactions,
        ]);
    }

    public function create(): view
    {
        return view('accounts.create');
    }

    public function store(): RedirectResponse
    {
        $details = request()->validate([
            'name' => 'required',
            'balance' => 'required|int',
            'currency_type' => 'required',
        ]);

        auth()->user()->accounts()->create($details);

        return redirect()->route('accounts.index');
    }

    public function show(Account $account)
    {
        return view('accounts.show', [
            'account' => $account
        ]);
    }

    public function edit(Account $account): view
    {
        return view('accounts.edit', compact('account'));
    }

    public function update(Request $request, Account $account): RedirectResponse
    {
        $account->update($request->all());

        return redirect()->route('accounts.index');
    }

    public function destroy(Account $account): RedirectResponse
    {
        $account->delete();

        return redirect()->route('accounts.index');
    }
}

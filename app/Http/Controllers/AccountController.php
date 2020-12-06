<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(): view
    {
        $accounts = auth()->user()->accounts;

        $user = auth()->user();

        return view('accounts.index', compact(['accounts', 'user']));
    }

    public function create(): view
    {
        return view('accounts.create');
    }

    public function store(): RedirectResponse
    {
        $details = request()->validate([
            'name' => 'required',
            'balance' => 'required',
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

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex justify-between items-center w-full pb-3">
            <a href="{{ route('accounts.create') }}" class="btn btn-primary btn-sm">
                Add new account
            </a>
            <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm float-right">
                Make a transaction
            </a>
        </div>
        <h1>Your accounts</h1>
        @if ($user->accounts->count() !== 0)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Account name</th>
                    <th scope="col">Balance</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @endif
                @forelse($accounts as $account)
                    <tr>
                        <th scope="row">{{ $account->id }}</th>
                        <td>
                            <a href="{{ route('accounts.show', $account) }}">
                                {{ $account->name }}
                            </a>
                        </td>
                        <td>{{ $account->balanceInDollars() }}</td>
                        <td>
                            <a href="{{ route('accounts.edit', $account) }}" class="btn btn-sm btn-warning">
                                Edit account name
                            </a>
                            <form method="post" action="{{ route('accounts.destroy', $account) }}"
                                  style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <br>
                    You have not created any bank accounts yet.
                @endforelse
                </tbody>
            </table>
    </div>
    <div class="container">
        <h1>Your sent transactions</h1>
        <div>
            @if ($sentTransactions->count() !== 0)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Description</th>
                        <th scope="col">Amount transferred</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @endif
                    @forelse($sentTransactions as $transaction)
                        <tr>
                            <th scope="row">{{ $transaction->id }}</th>
                            <td>
                                {{ $transaction->from_user_id }}
                            </td>
                            <td>
                                {{ $transaction->to_user_id }}
                            </td>
                            <td>
                                <a href="{{ route('transactions.show', $transaction) }}">
                                    {{ $transaction->description }}
                                </a>
                            </td>
                            <td>
                                {{ $transaction->transactionInDollars() }}
                            </td>
                            <td>
                                <form method="post" action="{{ route('transactions.destroy', $transaction) }}"
                                      style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                        Delete entry
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <br>
                        Currently there is no transaction history to show.
                    @endforelse
                    </tbody>
                </table>
        </div>
    </div>
    <div class="container">
        <h1>Your received transactions</h1>
        <div>
            @if ($receivedTransactions->count() !== 0)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Description</th>
                        <th scope="col">Amount transferred</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @endif
                    @forelse($receivedTransactions as $transaction)
                        <tr>
                            <th scope="row">{{ $transaction->id }}</th>
                            <td>
                                {{ $transaction->from_user_id }}
                            </td>
                            <td>
                                {{ $transaction->to_user_id }}
                            </td>
                            <td>
                                <a href="{{ route('transactions.show', $transaction) }}">
                                    {{ $transaction->description }}
                                </a>
                            </td>
                            <td>
                                {{ $transaction->transactionInDollars() }}
                            </td>
                            <td>
                                <form method="post" action="{{ route('transactions.destroy', $transaction) }}"
                                      style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                        Delete entry
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <br>
                        Currently there is no transaction history to show.
                    @endforelse
                    </tbody>
                </table>
        </div>
    </div>
@endsection

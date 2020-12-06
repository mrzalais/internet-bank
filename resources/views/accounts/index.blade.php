@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="pb-1">
            <a href="{{ route('accounts.create') }}" class="btn btn-primary btn-sm">
                Add new account
            </a>
        </div>
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
                                    Dzēst
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
@endsection

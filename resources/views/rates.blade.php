@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Rate</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @endif
                    @forelse($currencyArray as $currency)
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
                    @foreach($currencyArray as $currency)
                        {{ $currency }}
                    @endforeach
            </div>
        </div>
    </div>
@endsection

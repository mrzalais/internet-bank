@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="pb-3">
            <a href="{{ route('accounts.index') }}" class="btn btn-primary btn-sm">
                Back
            </a>
        </div>

        <h1>{{ $account->name }}</h1>
        <h2>
            Current balance: <b>{{ $account->formattedBalance() }}</b>
        </h2>
    </div>
@endsection

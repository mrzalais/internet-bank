@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ $account->name }}</h1>
        <h2>
            Current balance: <b>{{ $account->balanceInDollars() }}</b>
        </h2>
    </div>
    <div class="container">
        Here should be transaction history
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="pb-3">
            <a href="{{ route('accounts.index') }}" class="btn btn-primary btn-sm">
                Back
            </a>
        </div>

        @if (session('status'))
            <div class="alert alert-danger" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="/transactions">
            @csrf
            <h1 class="heading is-1">Make a new transaction</h1>

            <div class="field">
                <label for="name" class="label">From account</label>

                <div class="control">
                    <input type="text" class="form-control" id="name" name="from_user_account_id"
                           placeholder="account name...">
                </div>
            </div>

            <div class="field">
                <label for="balance" class="label">To account</label>

                <div class="control">
                    <input type="text" class="form-control" id="name" name="to_user_account_id"
                           placeholder="account name...">
                </div>
            </div>

            <div class="field">
                <label for="balance" class="label">Amount</label>

                <div class="control">
                    <input type="number" class="form-control" id="name" name="amount" placeholder="amount...">
                </div>
            </div>

            <div class="field">
                <label for="balance" class="label">Provide a description (optional)</label>

                <div class="control">
                    <input type="text" class="form-control" id="name" name="description" placeholder="description...">
                </div>
            </div>

            <div class="field">
                <div class="control pt-3">
                    <button type="submit" class="btn btn-primary">Confirm</button>
                    <a href="/accounts">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection

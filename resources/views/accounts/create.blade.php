@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="pb-3">
            <a href="{{ route('accounts.index') }}" class="btn btn-primary btn-sm">
                Back
            </a>
        </div>

        <form method="POST" action="/accounts">
            @csrf

            <h1 class="heading is-1">Add a new bank account</h1>

            <div class="field">
                <label for="name" class="label">Name</label>

                <div class="control">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
            </div>

            <div class="field">
                <label for="balance" class="label">Starting balance</label>

                <div class="control">
                    <input type="number" class="form-control" id="name" name="balance" placeholder="Starting balance">
                </div>
            </div>

            <div class="field">
                <label for="balance" class="label">Type of currency</label>

                <div class="control">
                    <input type="text" class="form-control" id="name" name="currency_type" placeholder="EUR/USD...">
                </div>
            </div>

            <div class="field">
                <div class="control pt-3">
                    <button type="submit" class="btn btn-primary">Create New Account</button>
                    <a href="/accounts">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection

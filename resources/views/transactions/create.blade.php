@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="/transactions">
            @csrf
            <h1 class="heading is-1">Make a new transaction</h1>

            <div class="field">
                <label for="name" class="label">From account</label>

                <div class="control">
                    <input type="text" class="input" name="from_user_id" placeholder="account name...">
                </div>
            </div>

            <div class="field">
                <label for="balance" class="label">To account</label>

                <div class="control">
                    <input type="text" class="input" name="to_user_id" placeholder="account name...">
                </div>
            </div>

            <div class="field">
                <label for="balance" class="label">Amount</label>

                <div class="control">
                    <input type="text" class="input" name="amount" placeholder="amount...">
                </div>
            </div>

            <div class="field">
                <label for="balance" class="label">Provide a description (optional)</label>

                <div class="control">
                    <input type="text" class="input" name="description" placeholder="description...">
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link">Add account</button>
                    <a href="/accounts">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection

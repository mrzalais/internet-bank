@extends('layouts.app')

@section('content')
    <form method="POST" action="/accounts">
        @csrf

        <h1 class="heading is-1">Add a new bank account</h1>

        <div class="field">
            <label for="name" class="label">Name</label>

            <div class="control">
                <input type="text" class="input" name="name" placeholder="Name">
            </div>
        </div>

        <div class="field">
            <label for="balance" class="label">Starting balance</label>

            <div class="control">
                <textarea class="textarea" name="balance" placeholder="Starting balance"></textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add account</button>
                <a href="/accounts">Cancel</a>
            </div>
        </div>
    </form>
@endsection

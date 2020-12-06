@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('accounts.index') }}" class="btn btn-primary btn-sm">
            Back
        </a>
        <form method="post" action="{{ route('accounts.update', $account) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Account name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $account->name }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection

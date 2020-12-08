@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Confirm Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Please enter your authentication code to login.') }}

                        <form method="POST" action="{{ url('/two-factor-challenge') }}">
                        @csrf
                        <input type="text" name="code"/>
                            <input name="submit" id="submit" class="btn btn-block login-btn mb-4" type="submit" value="">

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

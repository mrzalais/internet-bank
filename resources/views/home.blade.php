@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(! auth()->user()->two_factor_secret)
                            You have not enabled 2fa
                            <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    Enable
                                </button>
                            </form>
                        @else
                            You have 2fa enabled
                            <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">
                                    Disable
                                </button>
                            </form>
                        @endif

                        @if(session('status') === 'two-factor-authentication-enabled')
                            <p>
                                You now have enabled 2fa, please scan the following QR code with your phone application
                                of choice.
                            {!! auth()->user()->twoFactorQrCodeSvg() !!}

                            <p> Please store these recover codes in a secure location.
                                @foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                                    {{ trim($code) }} <br>
                                @endforeach
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

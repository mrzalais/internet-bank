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
                    @foreach($rates as $rate)
                        <tr>
                            <td>
                                {{ $rate->rate_id }}
                            </td>
                            <td>
                                {{ $rate->rate }}
                            </td>
                @endforeach
            </div>
        </div>
    </div>
@endsection

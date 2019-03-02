@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body introduction">

                        <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="">

                        <p>{{ __('You can purchase and download the Turkish or English versions of the Arka Kapı Magazine via the Arka Kapı Magazine Digital Subscription System.') }}</p>

                        <p>{{ __('Or you can automatically purchase any number that will be released by starting a subscription.') }}</p>

                        <div class="links">
                            <a href="{{ route('register') }}">{{ __('Buy a Issue') }}</a>
                            {{ __('or') }}
                            <a href="{{ route('register') }}">{{ __('Subscribe') }}</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

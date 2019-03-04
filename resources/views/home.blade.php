@extends('layouts.app')

@section('content')

    <section class="jumbotron text-center">
        <div class="container">
            <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="">
            <h1 class="jumbotron-heading">{{ __('Arka Kapi Magazine Digital Subscription System') }}</h1>
            <p class="lead text-muted">
                {{ __('You can purchase and download the Turkish or English versions of the Arka Kapı Magazine via the Arka Kapı Magazine Digital Subscription System.') . ' ' . __('Or you can automatically purchase any number that will be released by starting a subscription.') }}</p>
            <p>
                <a href="{{ route('subscribe') }}" class="btn btn-primary my-2">{{ __('Subscribe') }}</a>
                <a href="#issues" class="btn btn-secondary my-2">{{ __('Buy a Issue') }}</a>
            </p>
        </div>
    </section>

    <section id="issues" class="container">
        <div class="row">

            <div class="col-sm-12 col-md-4 issue">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="https://arkakapimag.com/wp-content/uploads/2019/01/arka_kapi_mag-iii-kapak-page-001.jpg" alt="">
                    <div class="card-body">
                        <p class="card-text text-center">Arka Kapi Magazine Issue 3</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 issue">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="https://arkakapimag.com/wp-content/uploads/2019/01/arka_kapi_mag-iii-kapak-page-001.jpg" alt="">
                    <div class="card-body">
                        <p class="card-text text-center">Arka Kapi Magazine Issue 3</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 issue">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="https://arkakapimag.com/wp-content/uploads/2019/01/arka_kapi_mag-iii-kapak-page-001.jpg" alt="">
                    <div class="card-body">
                        <p class="card-text text-center">Arka Kapi Magazine Issue 3</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 issue">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="https://arkakapimag.com/wp-content/uploads/2019/01/arka_kapi_mag-iii-kapak-page-001.jpg" alt="">
                    <div class="card-body">
                        <p class="card-text text-center">Arka Kapi Magazine Issue 3</p>
                    </div>
                </div>
            </div>


        </div>
    </section>

@endsection

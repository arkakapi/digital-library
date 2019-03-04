@extends('layouts.app')

@section('content')

    <section class="jumbotron text-center">
        <div class="container">
            <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="">
            <h1 class="jumbotron-heading">{{ __('Arka Kapi Magazine Digital Subscription System') }}</h1>
            <p class="lead text-muted">{{ __('You can purchase and download the Turkish or English versions of the Arka Kapı Magazine via the Arka Kapı Magazine Digital
            Subscription System.') . ' ' . __('Or you can automatically purchase any number that will be released by starting a subscription.') }}</p>
            <p>
                <a href="#" class="btn btn-primary my-2">Main call to action</a>
                <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p>
        </div>
    </section>

    <section class="container">

        <div class="row col-sm-12 issue">
            <div class="col-md-3 issue-image">
                <img class="card-img-top" src="https://arkakapimag.com/wp-content/uploads/2019/01/arka_kapi_mag-iii-kapak-page-001.jpg" alt="Card image cap">
            </div>
            <div class="col-md-9 issue-body">
                <div class="card-body">
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit
                        longer.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-muted">9 mins</small>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

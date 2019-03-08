@extends('layouts.app')

@section('content')

    <section class="jumbotron text-center">
        <div class="container">
            <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="">
            <h1 class="jumbotron-heading">{{ trans('app.name') }}</h1>
            <p class="lead text-muted">
                {{ __('You can purchase and download the Turkish or English versions of the Arka Kapı Magazine via the Arka Kapı Magazine Digital Subscription System.') . ' ' . __('Or you can automatically purchase any number that will be released by starting a subscription.') }}</p>
            <p>
                <a href="{{ route('subscribe') }}" class="btn btn-primary my-2">{{ __('Subscribe') }}</a>
                <a href="{{ route('issues.index') }}" class="btn btn-secondary my-2">{{ __('Buy a Issue') }}</a>
            </p>
        </div>
    </section>

    <section id="issues" class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>{{ __('Latest Issues') }}</h1>
            </div>
            @foreach($latest_issues as $issue)
                <div class="col-sm-12 col-md-6 issue">
                    <a href="{{ route('issues.show', $issue->slug) }}">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ Storage::disk('public')->url($issue->slug . '.jpg') }}" alt="">
                            <div class="card-body">
                                <p class="card-text text-center">{{ $issue->title }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

@endsection

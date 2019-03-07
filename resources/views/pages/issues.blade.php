@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('All Issues') }}</div>

                    <section id="issues" class="container">
                        <div class="row">
                            @foreach($issues as $issue)
                                <div class="col-md-12">
                                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                        <div class="col-md-8">
                                            <div class="card-body d-flex flex-column align-items-start">
                                                <h3 class="mb-0">
                                                    <a class="text-dark" href="{{ route('issues.show', $issue->slug) }}">{{ $issue->title }} ({{ $issue->language == 'tr' ? __('Turkish') : __('English') }})</a>
                                                </h3>
                                                <div class="mb-1 text-muted">{{ $issue->month }}, <b>{{ __('Price') }}: </b><i>{{ $issue->price . ' ' . ($issue->language == 'tr' ? __('TL') : __('USD')) }}</i></div>
                                                <p class="card-text mb-auto flex-auto d-none d-md-block">{!! $issue->content !!}</p>
                                                <a href="{{ route('issues.show', $issue->slug) }}" class="flex-auto d-none d-md-block">{{ __('See Content') }}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ route('issues.show', $issue->slug) }}">
                                                <img class="card-img-right" src="{{ Storage::disk('public')->url($issue->slug . '.jpg') }}" alt="{{ $issue->title }}" title="{{ $issue->title }}" data-holder-rendered="true">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
@endsection

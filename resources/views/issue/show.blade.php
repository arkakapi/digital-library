@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $issue->title }}</div>

                    <div class="card-body">
                        <div class="col-md-12">
                            <div id="issues" class="row">
                                <div class="col-md-8">
                                    <div class="card-body d-flex flex-column align-items-start">
                                        <h3 class="mb-0">
                                            <a class="text-dark" href="{{ route('issues.show', $issue->slug) }}">{{ $issue->title }} ({{ $issue->language == 'tr' ? __('Turkish') : __('English') }})</a>
                                        </h3>
                                        <div class="d-none d-md-block">
                                            <p>{!! $issue->content !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('issues.show', $issue->slug) }}">
                                        <img class="card-img-right" src="{{ Storage::disk('public')->url($issue->slug . '.jpg') }}" alt="{{ $issue->title }}" title="{{ $issue->title }}" data-holder-rendered="true">
                                    </a>
                                    <hr>
                                    <i class="btn btn-warning">
                                        {{ __('Price') }}:
                                        @if($issue->price > 0)
                                            {{ $issue->price }}
                                            {{ $issue->language == 'tr' ? __('TL') : __('USD') }}
                                        @else
                                            {{ __('FREE!') }}
                                        @endif
                                    </i>
                                    <hr>
                                    <a href="{{ route('issues.read', $issue->slug) }}" class="btn btn-info">{{ __('Read') }} <span class="fa fa-angle-right"></span></a>
                                    @if($issue->is_purchased)
                                        <!--a href="{{ route('issues.read', $issue->slug) }}" class="btn btn-info">{{ __('Read') }} <span class="fa fa-angle-right"></span></a-->
                                    @else
                                        <!--a href="{{ route('issues.buy', $issue->slug) }}" class="btn btn-success">{{ __('Buy') }} <span class="fa fa-angle-right"></span></a-->
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    {!! $issue->preamble !!}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sharethis-inline-share-buttons"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

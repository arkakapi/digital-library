@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Packages') }}</div>

                    <div id="my-purchases" class="card-body">
                        @foreach($packages as $package)
                            <h3>
                                {{ $package->title }}
                                ({{ $package->language == 'tr' ? __('Turkish') : __('English') }})
                                <span class="btn btn-warning">
                                    @if($package->price > 0)
                                        {{ $package->price }}
                                        {{ $package->language == 'tr' ? __('TL') : __('USD') }}
                                    @else
                                        {{ __('FREE!') }}
                                    @endif
                                </span>
                                <a href="{{ route('packages.buy', $package->slug) }}" class="btn btn-success btn-sm">{{ __('Buy') }} <span class="fa fa-angle-right"></span></a>
                            </h3>
                            <div class="row">
                                @foreach(json_decode($package->issues, true) as $issue)
                                    <div class="col-sm-12 col-md-4 col-lg-2 issue">
                                        @php $issue = $package->exist_issues->where('issue', $issue)->first(); @endphp
                                        @if($issue)
                                            <div class="card mb-4 box-shadow">
                                                <a href="{{ route('issues.show', $issue->slug) }}">
                                                    <img class="card-img-top" src="{{ Storage::disk('public')->url($issue->slug . '.jpg') }}" alt="">
                                                </a>
                                                <div class="card-body">
                                                    <p class="card-text text-center">
                                                        {{ ($issue->language == 'tr' ? 'Sayı' : 'Issue') . ' ' . $issue->issue}}
                                                    </p>
                                                    <a href="{{ route('issues.show', $issue->slug) }}" class="btn btn-success">{{ __('See') }} <span class="fa fa-angle-right"></span></a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="card mb-4 box-shadow">
                                                <img class="card-img-top" src="{{ asset('images/empty_cover.jpg') }}" alt="">
                                                <div class="card-body">
                                                    <p class="card-text text-center">{{ __('Not Yet Published') }}</p>
                                                    <button class="btn btn-success" disabled>{{ __('See') }} <span class="fa fa-angle-right"></span></button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

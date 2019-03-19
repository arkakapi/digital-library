@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('My Purchases') }}</div>

                    <div id="my-purchases" class="card-body">
                        @foreach($packages as $package)
                            @if(count($package->purchased_issues) > 0)
                                <h3>
                                    {{ $package->title }}
                                    ({{ $package->language == 'tr' ? __('Turkish') : __('English') }})
                                </h3>
                                <div class="row">
                                    @foreach($package->purchased_issues as $issue)
                                        @php $issue = $package->exist_issues->where('issue', $issue)->first(); @endphp
                                        @if($issue)
                                            <div class="col-sm-12 col-md-4 col-lg-2 issue">
                                                <div class="card mb-4 box-shadow">
                                                    <a href="{{ route('issues.read', $issue->slug) }}">
                                                        <img class="card-img-top" src="{{ Storage::disk('public')->url($issue->slug . '.jpg') }}" alt="">
                                                    </a>
                                                    <div class="card-body">
                                                        <p class="card-text text-center">
                                                            {{ ($issue->language == 'tr' ? 'Sayı' : 'Issue') . ' ' . $issue->issue}}
                                                        </p>
                                                        <a href="{{ route('issues.read', $issue->slug) }}" class="btn btn-success">{{ __('Read') }} <span class="fa fa-angle-right"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <hr>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

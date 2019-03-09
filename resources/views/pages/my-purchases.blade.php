@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('My Purchases') }}</div>

                    <div id="my-purchases" class="card-body">
                        @foreach($subscriptions as $subscription)
                            <h3>
                                {{ $subscription['language'] == 'tr' ? 'Arka Kapı Dergi' : "Arka Kapı Magazine" }} {{ $subscription['year'] }}
                                @php $intersect_count = count(array_intersect($subscription['potential_issues'], ${'purchases_'.$subscription['language']})) @endphp
                                @if($intersect_count == 0)
                                    <a href="{{ route('subscribe') }}" class="btn btn-success btn-sm">{{ __('Subscribe') }} <span class="fa fa-angle-right"></span></a>
                                @elseif($intersect_count == 6)
                                    <button class="btn btn-success btn-sm" disabled>{{ __('You have Bought All') }} <span class="fa fa-check"></span></button>
                                @else
                                    <span class="btn btn-warning btn-sm">{{ __('Complete The Missing Issues') }} <span class="far fa-frown"></span></span>
                                @endif
                            </h3>
                            <div class="row">
                                @foreach($subscription['potential_issues'] as $potential_issue)
                                    <div class="col-sm-12 col-md-4 col-lg-2 issue">
                                        @if(in_array($potential_issue, $subscription['published_issues']))
                                            @php $issue = $issues->where('language', $subscription['language'])->where('issue', $potential_issue)->first() @endphp
                                            <div class="card mb-4 box-shadow">
                                                <img class="card-img-top" src="{{ Storage::disk('public')->url($issue->slug . '.jpg') }}" alt="">
                                                <div class="card-body">
                                                    <p class="card-text text-center">
                                                        {{ ($subscription['language'] == 'tr' ? 'Sayı' : 'Issue') . ' ' . $potential_issue}}
                                                    </p>
                                                    @if(in_array($potential_issue, ${'purchases_'.$subscription['language']}))
                                                        <a href="{{ route('issues.read', $issue->slug) }}" class="btn btn-info">{{ __('Read') }} <span class="fa fa-angle-right"></span></a>
                                                    @else
                                                        <a href="{{ route('issues.show', $issue->slug) }}" class="btn btn-success">{{ __('Buy') }} <span class="fa fa-angle-right"></span></a>
                                                    @endif
                                                </div>
                                            </div>
                                        @else
                                            <div class="card mb-4 box-shadow">
                                                <img class="card-img-top" src="{{ asset('images/empty_cover.jpg') }}" alt="">
                                                <div class="card-body">
                                                    <p class="card-text text-center">{{ __('Not Yet Published') }}</p>
                                                    @if(in_array($potential_issue, ${'purchases_'.$subscription['language']}))
                                                        <button class="btn btn-info" disabled>{{ __('Read') }} <span class="fa fa-angle-right"></span></button>
                                                    @else
                                                        <a href="{{ route('issues.show', $issue->slug) }}" class="btn btn-success">{{ __('Buy') }} <span class="fa fa-angle-right"></span></a>
                                                    @endif
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

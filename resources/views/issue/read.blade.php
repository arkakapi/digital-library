@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="line-height: 36px;">
                        {{ $issue->title }}
                        <a href="{{ route('issues.pdf', $issue->slug) }}" class="btn btn-success float-right"><span class="fa fa-expand-arrows-alt"></span> {{ __('Fullscreen Mode') }}</a>
                    </div>

                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-1by1">
                            <iframe class="embed-responsive-item" src="{{ route('issues.pdf', $issue->slug) }}" allowfullscreen></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

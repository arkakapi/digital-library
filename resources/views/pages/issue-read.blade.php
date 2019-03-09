@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $issue->title }}</div>

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

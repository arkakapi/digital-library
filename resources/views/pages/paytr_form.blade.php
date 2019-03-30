@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $title . ' ' . __('Buy') }}</div>

                    <div class="card-body">
                        <iframe src="https://www.paytr.com/odeme/guvenli/{{ $token }}" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;height: 680px;"></iframe>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

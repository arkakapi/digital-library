@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $package->title . ' ' . __('Buy') }}</div>

                    <div class="card-body">
                        PACKAGE PAYMENT FORM
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

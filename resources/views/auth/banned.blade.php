@extends('layouts.app')

@section('content')
<div class="container body">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Account Suspended') }}</div>

                <div class="card-body">
                    {{ __('Your account has been suspended because it is used by more than one person.') }}
                    {{ __('If you think there is a mistake, please contact us.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

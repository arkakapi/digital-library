@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Contact') }}</div>

                    <div class="card-body">
                        <h3>{{ __('Contributing') }}</h3>
                        <p>
                            @lang(
                                'Thank you for considering contributing to the :app_name! See <a href=":link" target="_blank">opened issues</a>.',
                                [
                                    'app_name' => trans('app.name'),
                                    'link' => 'https://github.com/arkakapi/subscription-system/issues'
                                ]
                            )
                        </p>
                        <h3>{{ __('Security Vulnerabilities') }}</h3>
                        <p>
                            @lang(
                                'If you discover a security vulnerability within :app_name, please send an e-mail to <a href=":link" target="_blank">:name</a>, <a href="mailto::email">:email</a>.',
                                [
                                    'app_name' => trans('app.name'),
                                    'link' => 'https://twitter.com/om3rcitak',
                                    'name' => 'Omer Citak',
                                    'email' => 'omer@arkakapidergi.com'
                                ]
                            )
                            {{ __('All security vulnerabilities will be promptly addressed.') }}
                        </p>
                        <h3>{{ __('Any Problem') }}</h3>
                        <p><a href="mailto:omer@arkakapidergi.com">omer@arkakapidergi.com</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

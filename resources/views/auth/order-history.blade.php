@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Order History') }}</div>

                    <div id="my-purchases" class="card-body">
                        <div class="col-md-12">
                            <div class="row">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">@lang('Product')</th>
                                        <th scope="col">@lang('Issues')</th>
                                        <th scope="col">@lang('Total')</th>
                                        <th scope="col">@lang('Status')</th>
                                        <th scope="col">@lang('Date')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        @php
                                            $class = '';
                                            $class = $order->status == 'successful' ? 'success' : $class;
                                            $class = $order->status == 'unsuccessful' ? 'danger' : $class;
                                            $class = $order->status == 'pending' ? 'warning' : $class;
                                        @endphp
                                        <tr>
                                            <th scope="row">{{ $order->id }}</th>
                                            <td>{{ $order->product }}</td>
                                            <td>{{ implode(', ', $order->issues) }}</td>
                                            <td>{{ $order->total }} {{ $order->language == 'tr' ? 'TL' : 'USD' }}</td>
                                            <td><span class="btn btn-sm btn-{{ $class }}">{{ __($order->status) }}</span></td>
                                            <td>{{ $order->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

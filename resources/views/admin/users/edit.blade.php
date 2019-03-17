@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Icon Cards-->
        <div class="row">

            <div class="col-xl-6 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-users"></i>
                        </div>
                        <div class="mr-5">Bu üyenin satın aldığı sayı sayısı: <b>{{ count($purchases_tr) + count($purchases_en) }}</b></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5">Bu üyeden elde edilen toplam gelir: <b>{{ $user->total_tl }} TL, {{ $user->total_usd }} USD</b></div>
                    </div>
                </div>
            </div>

        </div>

        <form action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">

            <input name="_method" type="hidden" value="PATCH">

            @csrf

            <div class="card mb-3">
                <div class="card-header">
                    Düzenle: {{ $user->name . ' - ' . $user->email }}
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="name"><b>Adı-Soyadı</b></label>
                            <input id="name" name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $user->name }}">
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="email"><b>Eposta</b></label>
                            <input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $user->email }}" disabled>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="created_at"><b>Kayıt Tarihi</b></label>
                            <input id="created_at" name="created_at" type="text" class="form-control" value="{{ $user->created_at }}" disabled>
                            @if ($errors->has('created_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('created_at') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="password"><b>Parola</b> <i>Değiştirmeyecekseniz boş bırakın.</i></label>
                            <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="is_admin"><b>Admin?</b></label>
                            <select id="is_admin" name="is_admin" class="form-control{{ $errors->has('is_admin') ? ' is-invalid' : '' }}" required>
                                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>evet</option>
                                <option value="0" {{ $user->is_admin ? '' : 'selected' }}>hayır</option>
                            </select>
                            @if ($errors->has('is_admin'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_admin') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="is_banned"><b>Ban Durumu</b></label>
                            <select id="is_banned" name="is_banned" class="form-control{{ $errors->has('is_banned') ? ' is-invalid' : '' }}" required>
                                <option value="0" {{ $user->is_banned ? '' : 'selected' }}>temiz</option>
                                <option value="1" {{ $user->is_banned ? 'selected' : '' }}>banlı</option>
                            </select>
                            @if ($errors->has('is_banned'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_banned') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="email_verified_at"><b>Email Doğrulama Tarihi</b></label>
                            <input id="email_verified_at" name="email_verified_at" type="text" class="form-control" value="{{ $user->email_verified_at ? $user->email_verified_at : 'Eposta Onaylanmamış' }}" disabled>
                            @if ($errors->has('email_verified_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email_verified_at') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="job"><b>Meslek</b></label>
                            <input id="job" name="job" type="text" class="form-control{{ $errors->has('job') ? ' is-invalid' : '' }}" value="{{ $user->job }}">
                            @if ($errors->has('job'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('job') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="language"><b>Dil</b></label>
                            <select id="language" name="language" class="form-control{{ $errors->has('language') ? ' is-invalid' : '' }}">
                                <option value="tr" {{ $user->language == 'tr' ? 'selected' : '' }}>Türkçe</option>
                                <option value="en" {{ $user->language == 'en' ? 'selected' : '' }}>İngilizce</option>
                            </select>
                            @if ($errors->has('language'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('language') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="country_id"><b>Ülke</b></label>
                            <select id="country_id" name="country_id" class="form-control{{ $errors->has('country_id') ? ' is-invalid' : '' }}">
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ $country->id == $user->country_id ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('country_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('country_id') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <button class="btn btn-success" type="submit">Gönder</button>

                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    Satın Almalar
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="purchases_tr"><b>Arka Kapı Dergi (Türkçe)</b></label>
                            <select id="purchases_tr" name="purchases_tr[]" multiple size="10" class="form-control{{ $errors->has('purchases_tr') ? ' is-invalid' : '' }}">
                                @for($i = 1; $i <= $issues_all_count + 6; $i++)
                                    <option value="{{ $i }}" {{ in_array($i, $purchases_tr) ? 'selected' : '' }}>Sayı {{ $i }}</option>
                                @endfor
                            </select>
                            @if ($errors->has('purchases_tr'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('purchases_tr') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="purchases_en"><b>Arka Kapı Magazine (İngilizce)</b></label>
                            <select id="purchases_en" name="purchases_en[]" multiple size="10" class="form-control{{ $errors->has('purchases_en') ? ' is-invalid' : '' }}">
                                @for($i = 1; $i <= $issues_all_count + 6; $i++)
                                    <option value="{{ $i }}" {{ in_array($i, $purchases_en) ? 'selected' : '' }}>Sayı {{ $i }}</option>
                                @endfor
                            </select>
                            @if ($errors->has('purchases_en'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('purchases_en') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <button class="btn btn-success" type="submit">Gönder</button>

                </div>
            </div>

        </form>

    </div>
@stop

@section('js')
    <script>
        $('#purchases_tr').multiSelect();
        $('#purchases_en').multiSelect();
    </script>
@stop

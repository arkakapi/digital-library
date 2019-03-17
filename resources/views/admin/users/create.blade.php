@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="card mb-3">
                <div class="card-header">
                    Yeni Kullanıcı Ekle
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="name"><b>Adı-Soyadı</b></label>
                            <input id="name" name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="email"><b>Eposta</b></label>
                            <input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="is_admin"><b>Admin?</b></label>
                            <select id="is_admin" name="is_admin" class="form-control{{ $errors->has('is_admin') ? ' is-invalid' : '' }}" required>
                                <option value="0">hayır</option>
                                <option value="1">evet</option>
                            </select>
                            @if ($errors->has('is_admin'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_admin') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="job"><b>Meslek</b></label>
                            <input id="job" name="job" type="text" class="form-control{{ $errors->has('job') ? ' is-invalid' : '' }}" value="{{ old('job') }}">
                            @if ($errors->has('job'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('job') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="language"><b>Dil</b></label>
                            <select id="language" name="language" class="form-control{{ $errors->has('language') ? ' is-invalid' : '' }}" required>
                                <option value="">-- Seçiniz --</option>
                                <option value="tr">Türkçe</option>
                                <option value="en">İngilizce</option>
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
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
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
                                    <option value="{{ $i }}">Sayı {{ $i }}</option>
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
                                    <option value="{{ $i }}">Sayı {{ $i }}</option>
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

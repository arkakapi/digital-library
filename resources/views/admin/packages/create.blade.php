@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <form action="{{ route('admin.packages.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="card mb-3">
                <div class="card-header">
                    Yeni Paket Ekle
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="title"><b>Başlık</b></label>
                                    <input id="title" name="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" required>
                                    @if ($errors->has('title'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="price"><b>Ücret</b> <i>Dil Türkçe seçilir ise birim TL, İngilizce seçilir ise birim USD olur.</i></label>
                                    <input id="price" name="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="XX.YY" step="0.01" value="{{ old('price') }}" required>
                                    @if ($errors->has('price'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('price') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-12 mb-3">
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
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="issues"><b>Sayılar</b></label>
                                    <select id="issues" name="issues[]" multiple size="10" class="form-control{{ $errors->has('issues') ? ' is-invalid' : '' }}" required>
                                        @for($i = 1; $i <= $issues_all_count + 6; $i++)
                                            <option value="{{ $i }}">Sayı {{ $i }}</option>
                                        @endfor
                                    </select>
                                    @if ($errors->has('issues'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('issues') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
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
        $('#issues').multiSelect();
    </script>
@stop

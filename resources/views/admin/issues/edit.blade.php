@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card mb-3">
            <div class="card-header">
                Düzenle: {{ $issue->title }}
            </div>
            <div class="card-body">
                <form action="{{ route('admin.issues.update', $issue->id) }}" method="post" enctype="multipart/form-data">

                    <input name="_method" type="hidden" value="PATCH">

                    @csrf

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="price"><b>Ücret</b> <i>Dil Türkçe seçilir ise birim TL, İngilizce seçilir ise birim USD olur.</i></label>
                            <input id="price" name="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="XX.YY" step="0.01" value="{{ $issue->price }}" required>
                            @if ($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="issue"><b>Sayı</b></label>
                            <select id="issue" name="issue" class="form-control{{ $errors->has('issue') ? ' is-invalid' : '' }}" required>
                                @for($i = 1; $i <= $issues_all_count + 6; $i++)
                                    <option value="{{ $i }}" {{ $issue->issue == $i ? 'selected' : '' }}>Sayı {{ $i }}</option>
                                @endfor
                            </select>
                            @if ($errors->has('issue'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('issue') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="pdf"><b>Dijital Dergi</b> <i>PDF olmalı.</i> <a href="{{ route('issues.pdf', $issue->slug) }}" target="_blank">{{ $issue->slug }}.pdf</a></label>
                            <input id="pdf" name="pdf" type="file" class="form-control-file{{ $errors->has('pdf') ? ' is-invalid' : '' }}">
                            @if ($errors->has('pdf'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pdf') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="month"><b>Aylar ve Yıl</b> <i>Örneğin; 02-03 2019</i></label>
                            <input id="month" name="month" type="text" class="form-control{{ $errors->has('month') ? ' is-invalid' : '' }}" placeholder="02-03 2019" value="{{ $issue->month }}" required>
                            @if ($errors->has('month'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('month') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="language"><b>Dil</b></label>
                            <select id="language" name="language" class="form-control{{ $errors->has('language') ? ' is-invalid' : '' }}" required>
                                <option value="tr" {{ $issue->language == 'tr' ? 'selected' : '' }}>Türkçe (Arka Kapı Dergi)</option>
                                <option value="en" {{ $issue->language == 'en' ? 'selected' : '' }}>İngilizce (Arka Kapı Magazine)</option>
                            </select>
                            @if ($errors->has('language'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('language') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cover"><b>Kapak</b> <i>JPG olmalı.</i> <a href="{{ config('app.url') . '/storage/' . $issue->slug }}.jpg" target="_blank">{{ $issue->slug }}.jpg</a></label>
                            <input id="cover" name="cover" type="file" class="form-control-file{{ $errors->has('cover') ? ' is-invalid' : '' }}">
                            @if ($errors->has('cover'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cover') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="content"><b>İçerik</b></label>
                            <textarea id="content" name="content" class="summernote form-control-file{{ $errors->has('content') ? ' is-invalid' : '' }}" required>
                                {{ $issue->content }}
                            </textarea>
                            @if ($errors->has('content'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('content') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="preamble"><b>Önsöz</b></label>
                            <textarea id="preamble" name="preamble" class="summernote form-control-file{{ $errors->has('preamble') ? ' is-invalid' : '' }}" required>
                                {{ $issue->preamble }}
                            </textarea>
                            @if ($errors->has('preamble'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('preamble') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <button class="btn btn-success" type="submit">Gönder</button>

                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 300
            });
        });
    </script>
@stop

@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                Eposta Gönderimi
            </div>
            <div class="card-body">

                <form action="" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="user"><b>Kime</b></label>
                            <select id="user" name="user">
                                <option value="0">-- Seçiniz --</option>
                                <option value="everybody">Tüm Kullanıcılar</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} &lt;{{ $user->email }}&gt;</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="issue"><b>Eposta Taslağı</b></label>
                            <select id="issue" name="issue" class="form-control">
                                <option value="0">-- Seçiniz --</option>
                                @foreach($issues as $issue)
                                    <option value="{{ $issue->id }}">"{{ $issue->title }}" Hatırlatma Epostası</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="progress" class="col-md-12 mb-3" style="display:none;">
                            <div class="alert alert-info">
                                Epostalar gönderiliyor. Lütfen gönderim bitene kadar sayfayı kapatmayın. Gönderim bitince bilgilendirileceksiniz.
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width:0%">
                                    <span>%10 (5)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <select id="users" style="display: none">
                        @forEach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                        @endforeach
                    </select>

                    <button class="btn btn-success" type="submit">Gönder</button>

                </form>
            </div>
        </div>
    </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function () {

            // Selectize
            $('#user').selectize({
                persist: false
            });

            // Send email
            $("form").submit(function (e) {

                e.preventDefault();

                let success = true;
                let user = $('#user').val();
                let issue = $('#issue').val();

                if (user == '0') {
                    alert('Epostanın kime gönderileceği seçilmeli!');
                    success = false;
                }

                if (issue == '0') {
                    alert('Epostanın taslağı seçilmeli!');
                    success = false;
                }

                if (success) {

                    let users = [];
                    if (user == 'everybody') {
                        $('#users option').each(function () {
                            users.push($(this).val());
                        });
                    } else {
                        users.push($('#user option').val());
                    }

                    $('#progress').show();
                    $('.btn-success').hide();

                    let progress = 0;
                    let count = 1;
                    for (let i = 0, p = Promise.resolve(); i < users.length; i++) {
                        p = p.then(_ => new Promise(resolve =>
                            setTimeout(function () {
                                $.ajax({
                                    type: "GET",
                                    url: 'email/send/' + users[i] + '/' + issue,
                                    success: function (data) {
                                        progress += 100 / users.length;
                                        $('.progress-bar').css('width', progress + '%');
                                        $('.progress-bar span').html('%' + parseInt(progress) + ' (' + count + ')');

                                        if (count == users.length) {
                                            $('#progress .alert').removeClass('alert-info');
                                            $('#progress .alert').addClass('alert-success');
                                            //alert('Gonderim Tamamlandi');
                                        }
                                        count++;
                                        resolve();
                                    }
                                });
                            }, 1)
                        ));
                    }

                }

            });

        });
    </script>
@stop

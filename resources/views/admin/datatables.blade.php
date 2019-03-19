@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                {{ $title }}
                <a href="{{ route(getRouteName('create')) }}" class="btn btn-success btn-sm">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Yeni Ekle</span>
                </a>
            </div>
            <div class="card-body">
                <table id="datatables" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        @foreach($thead as $th)
                            <th>{{ $th }}</th>
                        @endforeach
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#datatables').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "?json=true",
                "order": [[0, "desc"]],
                "language": {
                    "sDecimal": ",",
                    "sEmptyTable": "Tabloda herhangi bir veri mevcut değil",
                    "sInfo": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                    "sInfoEmpty": "Kayıt yok",
                    "sInfoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "Sayfada _MENU_ kayıt göster",
                    "sLoadingRecords": "Yükleniyor...",
                    "sProcessing": "İşleniyor...",
                    "sSearch": "Ara:",
                    "sZeroRecords": "Eşleşen kayıt bulunamadı",
                    "oPaginate": {
                        "sFirst": "İlk",
                        "sLast": "Son",
                        "sNext": "Sonraki",
                        "sPrevious": "Önceki"
                    },
                    "oAria": {
                        "sSortAscending": ": artan sütun sıralamasını aktifleştir",
                        "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                    },
                    "select": {
                        "rows": {
                            "_": "%d kayıt seçildi",
                            "0": "",
                            "1": "1 kayıt seçildi"
                        }
                    }
                }
            });
        });
    </script>
@stop

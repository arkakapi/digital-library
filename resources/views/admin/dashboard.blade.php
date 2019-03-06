@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Icon Cards-->
        <div class="row">

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-users"></i>
                        </div>
                        <div class="mr-5">Toplam üye sayısı: <b>{{ $total_users_count }}</b></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-users"></i>
                        </div>
                        <div class="mr-5">Toplam alım yapan üye sayısı: <b>{{ $bought_users_count }}</b></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5">Toplam TL geliri: <b>{{ $total_tl }} TL</b></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5">Toplam USD geliri: <b>{{ $total_usd }} USD</b></div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Area Chart Example-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                İstatistik Grafiği
            </div>
            <div class="card-body">
                <canvas id="statistics" width="100%" height="30"></canvas>
            </div>
        </div>

    </div>
@stop

@section('js')
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        // Statistics Chart
        new Chart(document.getElementById("statistics"), {
            type: 'line',
            data: {
                labels: [{!! '"' . implode('", "', $months) . '"'  !!}],
                datasets: [
                    /*{
                        label: "Satın Alınan Dergi Sayısı",
                        lineTension: 0.3,
                        backgroundColor: "rgba(2,117,216,0.2)",
                        borderColor: "rgba(2,117,216,1)",
                        pointRadius: 5,
                        pointBackgroundColor: "rgba(2,117,216,1)",
                        pointBorderColor: "rgba(255,255,255,0.8)",
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(2,117,216,1)",
                        pointHitRadius: 50,
                        pointBorderWidth: 2,
                        data: [10000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984],
                    },*/
                    {
                        label: "Kayıt Olan Üyeler",
                        lineTension: 0.3,
                        backgroundColor: "rgba(2,134,49,0.2)",
                        borderColor: "rgba(2,134,49,1)",
                        pointRadius: 5,
                        pointBackgroundColor: "rgba(2,134,49,1)",
                        pointBorderColor: "rgba(255,255,255,0.8)",
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(2,134,49,1)",
                        pointHitRadius: 50,
                        pointBorderWidth: 2,
                        data: [{!! '"' . implode('", "', $bought_users_graphic) . '"'  !!}],
                    }
                ],
            }
        });

    </script>
@stop

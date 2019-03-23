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
                Üye Kayıt Grafiği
            </div>
            <div class="card-body">
                <canvas id="user-register" width="100%" height="30"></canvas>
            </div>
        </div>

        <!-- Area Chart Example-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Satın Alma Grafiği
            </div>
            <div class="card-body">
                <canvas id="purchases" width="100%" height="30"></canvas>
            </div>
        </div>

    </div>
@stop

@section('js')
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        new Chart(document.getElementById("user-register"), {
            type: 'line',
            data: {
                labels: [{!! '"' . implode('", "', $user_register_months) . '"'  !!}],
                datasets: [
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

        new Chart(document.getElementById("purchases"), {
            type: 'line',
            data: {
                labels: [{!! '"' . implode('", "', $purchases_register_months) . '"'  !!}],
                datasets: [
                    {
                        label: "TL",
                        lineTension: 0.3,
                        backgroundColor: "rgba(2,134,49,0.2)",
                        borderColor: "rgba(2,134,49,1)",
                        pointRadius: 5,
                        pointBackgroundColor: "rgba(2,134,49,1)",
                        pointBorderColor: "rgba(2,134,49,0.8)",
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(2,134,49,1)",
                        pointHitRadius: 50,
                        pointBorderWidth: 2,
                        data: [{!! '"' . implode('", "', $purchases_tr) . '"'  !!}],
                    },
                    {
                        label: "USD",
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
                        data: [{!! '"' . implode('", "', $purchases_en) . '"'  !!}],
                    }
                ],
            }
        });

    </script>
@stop

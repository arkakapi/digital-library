<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel | {{ config('app.name') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">

    @yield('css')

</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>
    <a class="navbar-brand mr-1" href="{{ route('admin.dashboard') }}">{{ config('app.name') }}</a>
</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item{{ Route::currentRouteName() == 'admin.dashboard' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item{{ getParentRouteName() == 'admin.users' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Kullanıcılar</span>
            </a>
        </li>
        <li class="nav-item{{ getParentRouteName() == 'admin.issues' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('admin.issues.index') }}">
                <i class="fas fa-fw fa-book-open"></i>
                <span>Sayılar</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Eposta Gönderimi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-list"></i>
                <span>Satın Alma Logları</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-sliders-h"></i>
                <span>Giriş Logları</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-backspace"></i>
                <span>Geri Dön</span>
            </a>
        </li>
    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">
            @if(Session::has('message'))
                <div class="alert alert-{{Session::get('class')}}" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
        </div>

    @yield('content')

    <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>{{ config('app.name') }}</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="{{ asset('js/admin.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

@yield('js')

</body>
</html>

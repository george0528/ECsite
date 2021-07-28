<!doctype html>
<html lang="jp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    {{-- js --}}
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboart.css') }}">
    <!-- Bootstrap core CSS -->
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
        font-size: 3.5rem;
        }
    }
    </style>

    
    <!-- Custom styles for this template -->
</head>
<body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('adminIndex') }}">ダッシュボード</a>
<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
<ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
    <a class="nav-link" href="#">Sign out</a>
    </li>
</ul>
</header>

<div class="container-fluid">
<div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('index') }}">
                <span data-feather="home"></span>
                ショップ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('adminIndex') }}">
                <span data-feather="home"></span>
                商品
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('adminOrder') }}">
            <span data-feather="file"></span>
            注文
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminCategory') }}">
            <span data-feather="shopping-cart"></span>
            カテゴリー
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminPhoto') }}">
            <span data-feather="users"></span>
            写真
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminDiscount') }}">
            <span data-feather="bar-chart-2"></span>
            割引
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminTag') }}">
            <span data-feather="layers"></span>
            タグ
            </a>
        </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Saved reports</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
        </a>
        </h6>
        <ul class="nav flex-column mb-2">
        <li class="nav-item">
            <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Current month
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Last quarter
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Social engagement
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Year-end sale
            </a>
        </li>
        </ul>
    </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button>
        </div>
    </div>

    {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
    @yield('content')
    
    </main>
</div>
</div>
<script src="{{ asset('js/dashbord.js') }}"></script>
{{-- ajax --}}
<script src="{{ asset('js/ajaxCategory.js') }}"></script>
</body>
</html>

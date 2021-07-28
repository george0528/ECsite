<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Swiper.js スライドショー --}}
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7Q4C6K7G6S"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-7Q4C6K7G6S');
    </script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- ICON --}}
    <link rel="icon" href="{{ asset('image/favicon.ico') }}">
    {{-- Font-Awesome --}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    {{-- Font-Style --}}
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans+JP&amp;subset=japanese' rel="stylesheet">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    {{-- Title --}}
    <title>@yield('title')</title>
</head>

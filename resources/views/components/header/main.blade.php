<body>
    <header class="header">
        <div class="header_navbar">
            <div class="header_navbar_left">
                <a href="{{ route('index') }}" class="header_navbar_left_logo"><img class="header_navbar_left_logo-img" src="{{ asset('image/logo1 (1).png') }}" alt=""></a>
            </div>
            <div class="header_navbar_right">
                {{-- 検索フォーム --}}
                <form method="get" action="{{ route('search') }}" class="header_navbar_right_search search_container">
                    @if (isset($keyword))
                        <input type="text" size="25" value="{{ $keyword }}" placeholder="商品を検索する" name='keyword'>
                    @else
                        <input type="text" size="25" placeholder="商品を検索する" autocomplete="off" name='keyword'>
                    @endif
                    <input type="submit" value="&#xf002">
                </form>
                <div class="header_navbar_right_user">
                    {{-- ログインしてたら --}}
                    <div class="header_navbar_right_user_menu">
                        <img src="{{ asset('image/user_icon.png') }}" alt="" class="header_navbar_right_user_menu-icon">
                        @if (Auth::user())
                            <p class="header_navbar_right_user_menu-name">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="header_navbar_right_user_menu_drop">
                            <a href="{{ route('mypage') }}" class="header_navbar_right_user_menu_drop-mypage">マイページ</a>
                            <a href="{{ route('showorder') }}" class="header_navbar_right_user_menu_drop-order">注文履歴</a>
                            <a href="{{ route('logout') }}" class="header_navbar_right_user_menu_drop-logout">ログアウト</a>
                            <form action="{{ route('logout') }}" method="post" class="header_navbar_right_user_menu_drop-form">@csrf</form>
                        </div>
                        @endif
                        @guest
                        <div class="header_navbar_right_user_menu_drop">
                            <a href="{{ route('login') }}" class="header_navbar_right_user_menu_drop-login">ログイン</a>
                            <a href="{{ route('register') }}" class="header_navbar_right_user_menu_drop-register">新規登録</a>
                        </div>
                        @endguest
                    </div>
                <a href="{{ route('mycart') }}" class="header_navbar_right_cart"><img src="{{ asset('image/cart.jpeg') }}" alt="カート"></a>
                <div class="header_navbar_right_bars">
                    <span class="header_navbar_right_bars-bar"></span>
                    <span class="header_navbar_right_bars-bar"></span>
                    <span class="header_navbar_right_bars-bar"></span>
                </div>
            </div>
        </div>
    </header>
    <div id="header-space"></div>
    <div id="side-cover"></div>
    <form method="get" action="{{ route('search') }}" id="top-search" class="search_container">
        @if (isset($keyword))
            <input type="text" size="25" value="{{ $keyword }}" placeholder="商品を検索する" name='keyword'>
        @else
            <input type="text" size="25" placeholder="商品を検索する" name='keyword'>
        @endif
        <input type="submit" value="&#xf002">
    </form>
    <main class="main">
@extends('layouts.mainNoside')

@section('content')
@if(session('message'))
    <div class="component">
        <div class="component_alert danger">{{ session('message') }}</div>
    </div>
@endif
<div class="main_NScontents_login">
    <h2 class="main_NScontents_login-title">ログイン</h2>
    <div class="main_NScontents_login_box">
        <form class="main_NScontents_login_box_form" action="{{ route('login') }}" method="post">
            @csrf
            <label for="" class="main_NScontents_login_box_form-label">メールアドレス</label><br>
            <input type="email" class="main_NScontents_login_box_form-input" name="email" placeholder="example@sticker.com" value="{{ old('email') }}" required autocomplete="email" autofocus><br>
            <label for="" class="main_NScontents_login_box_form-label">パスワード</label><br>
            <input id="login_password" type="password" class="main_NScontents_login_box_form-input" name="password" required autocomplete="current-password" autofocus><br>
            <div class="main_NScontents_login_box_form_show">
                <input type="checkbox" name="checkbox" id="" class="main_NScontents_login_box_form_show-checkbox">
                <label class="main_NScontents_login_box_form_show-label" for="">パスワードを表示する</label>
            </div>
            <button class="main_NScontents_login_box_form-btn" type="submit">ログイン</button>
        </form>
    </div>
</div>
<script src="{{ asset('js/login.js') }}"></script>
@endsection
@extends('layouts.mainNoside')

@section('content')
<div class="main_NScontents_register">
    <h2 class="main_NScontents_register-title">新規会員登録</h2>
    <div class="main_NScontents_register_box">
        <form class="main_NScontents_register_box_form" action="{{ route('register') }}" method="post">
            @csrf
            <label for="" class="main_NScontents_register_box_form-label">名前</label><small class="main_NScontents_register_box_form-icon">必須</small><br>
            <input type="text" class="main_NScontents_register_box_form-input" name="name" value="{{ old('name') }}" required autocomplete="email" autofocus><br>
            <label for="" class="main_NScontents_register_box_form-label">メールアドレス</label><small class="main_NScontents_register_box_form-icon">必須</small><br>
            <input type="email" class="main_NScontents_register_box_form-input" name="email" placeholder="example@sticker.com" value="{{ old('email') }}" required autocomplete="name" autofocus><br>
            <label for="" class="main_NScontents_register_box_form-label">パスワード</label><small class="main_NScontents_register_box_form-icon">必須</small><br>
            <input id="register_password" type="password" class="main_NScontents_register_box_form-input" name="password" required autocomplete="new-password" autofocus><br>
            <label for="" class="main_NScontents_register_box_form-label">パスワード確認</label><small class="main_NScontents_register_box_form-icon">必須</small><br>
            <input id="register_password" type="password" class="main_NScontents_register_box_form-input" name="password_confirmation" required autocomplete="new-password" autofocus><br>
            <button class="main_NScontents_register_box_form-btn" type="submit">新規会員登録</button>
        </form>
    </div>
</div>
@endsection

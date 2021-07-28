@extends('layouts.mainNoside')
@section('title', '会員情報の変更')
@section('content')
<div class="main_NScontents_mypageForm">
    <h2 class="main_NScontents_mypageForm-title">会員情報の変更</h2>
    <form action="{{ route('changeMypage') }}" class="main_NScontents_mypageForm_form" method="POST">
        @csrf
        <label for="">アカウント名</label><br>
        <input type="text" name="name" value="{{ $data->name }}"><br>
        <label for="">名前</label><br>
        <input type="text" name="realname" value="{{ $data->realname }}"><br>
        <label  for="">メールアドレス</label><br>
        <input type="email" name="email" value="{{ $data->email }}"><br>
        <label for="">郵便番号</label><br>
        <input type="int" name="zipcode" value="{{ $data->zipcode }}"><br>
        <label for="">住所</label><br>
        <input type="text" name="address" value="{{ $data->address }}"><br>
        <div class="main_NScontents_mypageForm_form_btns">
            <button type="submit">変更を保存する</button>
            <a href="{{ route('mypage') }}" class="main_NScontents_mypageForm_form_btns-cancel">キャンセル</a>
        </div>
    </form>
</div>
@endsection
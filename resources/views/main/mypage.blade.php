@extends('layouts.mainNoside')
@section('title', 'マイページ')
@section('content')
<div class="main_NScontents_mypage">
    <h2 class="main_NScontents_mypage-title">マイページ</h2>
    <div class="component">
        @if (!isset(Auth::user()->realname))
        <div class="component">
            <div class="component_alert danger">お届け先の名前が未登録です</div>
        </div>
        @endif
        @if (!isset(Auth::user()->address))
        <div class="component">
            <div class="component_alert danger">お届け先住所が未登録です</div>
        </div>
        @endif
    </div>
    <div class="main_NScontents_mypage_list">
        <div class="main_NScontents_mypage_list_content">
            <div class="main_NScontents_mypage_list_content_top">
                <p class="main_NScontents_mypage_list_content_top-title">会員メールアドレス</p>
                <a href="" class="main_NScontents_mypage_list_content_top-a">メールアドレスを変更</a>
            </div>
            <div class="main_NScontents_mypage_list_content_box">
                <p class="main_NScontents_mypage_list_content_box-title">メールアドレス</p>
                <p class="main_NScontents_mypage_list_content_box-content">{{ $data->email }}</p>
            </div>
        </div>
        <div class="main_NScontents_mypage_list_content">
            <div class="main_NScontents_mypage_list_content_top">
                <p class="main_NScontents_mypage_list_content_top-title">会員詳細情報</p>
                <a href="{{ route('mypageForm') }}" class="main_NScontents_mypage_list_content_top-a">会員詳細情報を変更</a>
            </div>
            @php
                $users = [
                    [
                        'title' => 'アカウント名',
                        'content' => $data->name,
                    ],
                    [
                        'title' => '名前',
                        'content' => $data->realname,
                    ],
                    [
                        'title' => '郵便番号',
                        'content' => $data->zipcode,
                    ],
                    [
                        'title' => '住所',  
                        'content' => $data->address,
                    ],
                ];
            @endphp
            @foreach ($users as $user)
                <div class="main_NScontents_mypage_list_content_box">
                    <p class="main_NScontents_mypage_list_content_box-title">{{ $user['title'] }}</p>
                    @if (isset($user['content']))
                        <p class="main_NScontents_mypage_list_content_box-content">{{ $user['content'] }}</p>
                        @else
                        <p style="color: red" class="main_NScontents_mypage_list_content_box-content">未登録</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
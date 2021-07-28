@extends('layouts.searchLayout')
@section('title', '検索結果：'.$keyword)
@section('content')
@include('components.main.content.content_search', ['title' => '検索結果：'.$keyword, 'datas' => $stocks])
@endsection
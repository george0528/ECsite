@extends('layouts.mainLayout')
@section('title', $categoryName)
@section('content')
@include('components.main.content.content_search',['title' => $categoryName.'一覧', 'datas' => $stocks])
@endsection
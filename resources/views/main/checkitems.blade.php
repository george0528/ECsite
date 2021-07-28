@extends('layouts.mainLayout')
@section('title', $title)
@section('content')
@include('components.main.content.content_check', ['title' => $title, 'datas' => $stocks])
@endsection
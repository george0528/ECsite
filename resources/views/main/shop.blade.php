@extends('layouts.app')

@section('content')
<a href="{{ route('category') }}" class="text-center">カテゴリー一覧</a>
@include('components.main.content.content', ['h1' => '商品一覧', 'num' => 1])
@endsection
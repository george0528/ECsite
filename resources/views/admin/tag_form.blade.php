@extends('layouts.admin')
@section('title', 'タグ追加フォーム')
@section('content')
<br>
<form class="text-center" action="{{ route('adminTagAdd') }}" method="post" enctype="multipart/form-data">
    @csrf
    <br>
    <label for="">タグの名前</label><br>
    <input required class="mb-3" type="text" name="name" autofocus><br>
    <br>
    <button class="btn btn-primary" type="submit">追加</button>
</form>
@endsection
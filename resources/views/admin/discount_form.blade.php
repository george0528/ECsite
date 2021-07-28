@extends('layouts.admin')
@section('title', '割引の追加フォーム')
@section('content')
<br>
<form class="text-center" action="{{ route('adminDiscountAdd') }}" method="post" enctype="multipart/form-data">
    @csrf
    <br>
    <label for="">割引の名前</label><br>
    <input required class="mb-3" type="text" name="name"><br>
    <br>
    <label for="">割引のパーセント</label><br>
    <input required class="mb-3" type="text" name="percent"><br>
    <br>
    <label for="">割引値</label><br>
    <input required class="mb-3" type="number" name="discount" step="0.01"><br>
    <button class="btn btn-primary" type="submit">追加</button>
</form>
@endsection
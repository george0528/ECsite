@extends('layouts.admin')
@section('title', '写真の追加フォーム')
@section('content')
<br>
<form class="text-center" action="{{ route('adminPhotoAdd') }}" method="post" enctype="multipart/form-data">
    @csrf
    <br>
    <label for="">商品</label><br>
    <select class="mb-3" name="stock_id" id="">
        @foreach ($datas as $item)
            <option value="{{ $item->id }}">{{ $item->id }}：{{ $item->name }}</option>
        @endforeach 
    </select>
    <br>
    <label for="">画像</label><br>
    <input required class="mb-3" type="file" name="imgpath[]"><br>
    <input class="mb-3" type="file" name="imgpath[]"><br>
    <button class="btn btn-primary" type="submit">追加</button>
</form>
@endsection
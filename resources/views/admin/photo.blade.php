@extends('layouts.admin')
@section('title', 'Photo')
@section('content')
@if (session('message'))
<div class="alert alert-success">{{ session('message') ?? '何にもない' }}</div>
@endif
<a class="btn btn-primary" href="{{ route('adminPhotoForm') }}">写真を追加</a><br>
<h2 class="my-3">並び替え</h2>
<a href="{{ route('adminPhoto') }}" class="btn btn-secondary">ID順</a>
<a href="{{ route('adminPhoto', ['sort' => 1]) }}" class="btn btn-secondary">商品ID順</a>
<h2 style="margin-top: 20px">画像</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th>id</th>
            <th>stock_id</th>
            <th>imgpath</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($photos as $photo)
            <tr>
                <td class="text-secondary">{{ $photo->id }}</td>
                <td class="font-weight-bold text-dark" style="font-size: 1.2em">{{ $photo->stock_id }}</td>
                <td>{{ $photo->imgpath }}</td>
                <td><img src="{{ asset('storage/image/'.$photo->imgpath) }}" style="object-fit: cover" alt="" width="175px" height="175px"></td>
                <td>
                    <form action="{{ route('adminPhotoDelete') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $photo->id }}" name="photo_id">
                        <input class="btn btn-danger" type="submit" value="削除">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
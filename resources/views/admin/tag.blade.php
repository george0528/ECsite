@extends('layouts.admin')
@section('title', 'タグ')
@section('content')
@if (session('message'))
<div class="alert alert-success">{{ session('message') ?? '何にもない' }}</div>
@endif
<a class="btn btn-primary" href="{{ route('adminTagForm') }}">タグを追加</a><br>
<h2 class="my-3">並び替え</h2>
{{-- <a href="{{ route('adminPhoto') }}" class="btn btn-secondary">ID順</a>
<a href="{{ route('adminPhoto', ['sort' => 1]) }}" class="btn btn-secondary">商品ID順</a> --}}
<h2 style="margin-top: 20px">タグ</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th>id</th>
            <th>name</th>
            <th>item</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
            <tr>
                <td class="text-dark">{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td>
                    @foreach ($tag->tagmap as $tagmap)
                        {{ $tagmap->stock->name }}<br>
                    @endforeach
                </td>
                <td>
                    <form action="{{ route('adminTagDelete') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $tag->id }}" name="tag_id">
                        <input class="btn btn-danger" type="submit" value="削除">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
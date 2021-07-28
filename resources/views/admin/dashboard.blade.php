@extends('layouts.admin')
@section('title', 'ダッシュボード')
@section('content')
@if (session('message'))
    @if (session('flag'))
        <div class="alert alert-danger">{{ session('message') ?? '何にもない' }}</div>
    @else
        <div class="alert alert-success">{{ session('message') ?? '何にもない' }}</div>
    @endif
@endif
<a class="btn btn-primary" href="{{ route('adminCreateForm') }}">商品追加</a><br>
<div class="selects mt-5">
    <h3>一括操作</h3>
    <form id="AllControlForm" action="{{ route('adminAllControl') }}" method="post">
        @csrf
        <button class="btn btn-outline-primary Allbtns" type="submit" name="btns" value="status">販売状態変更</button>
        <button class="btn btn-outline-primary Allbtns" type="submit" name="btns" value="tag">タグを追加</button>
        <button class="btn btn-outline-danger Allbtns" type="submit" name="btns" value="delete">削除</button>
        <button class="btn btn-outline-secondary Allbtns" type="submit" name="btns" value="dummy">ダミー</button>
    </form>
</div>
<h2 style="margin-top: 20px">商品</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
    <thead>
        <tr>
        <th>select</th>
        <th>id</th>
        <th>name</th>
        <th>detail</th>
        <th>fee</th>
        <th>category</th>
        <th>tag</th>
        <th>discount</th>
        <th>url</th>
        <th>status</th>
        <th>状態</th>
        <th>編集</th>
        {{-- <th>削除</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr>
        <td><input class="text-center" style="transform: scale(1.5)" type="checkbox" name="checkbox[]" value="{{ $item->id }}" form="AllControlForm"></td>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->detail }}</td>
        <td>{{ $item->fee }}</td>
        <td>{{ $item->category->name }}</td>
        <td>
            @foreach ($item->tagmap as $tagmap)
                {{ $tagmap->tag->name }}<br>
            @endforeach
        </td>
        <td>{{ $item->discount->name }}</td>
        @if(isset($item->url))
            <td><a href="{{ $item->url }}">URL</a></td>
        @else
            <td>×</td>
        @endif
        @if ($item->status)
        <td style="color: green">販売中</td>
        <td>
            <form action="{{ route('adminStatus') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $item->id }}" name="id">
            <input class="btn btn-primary text-center" type="submit" value="変更">
            </form>
        </td>
        @else
        <td style="color: red">販売停止</td>
        <td>
            <form action="{{ route('adminStatus') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $item->id }}" name="id">
            <input class="btn btn-success text-center" type="submit" value="変更">
            </form>
        </td>
        @endif
        <td>
            <a class="btn btn-secondary" href="{{ route('adminEditForm', $item->id) }}">編集</a>
        </td>
        {{-- <td>
            <form action="{{ route('adminDelete') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $item->id }}" name="id">
                <input class="btn btn-danger" type="submit" value="削除">
            </form>
        </td> --}}
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
@extends('layouts.admin')
@section('title', 'Orders')
@section('content')
@if (session('message'))
<div class="alert alert-success">{{ session('message') ?? '何にもない' }}</div>
@endif
<h2 style="margin-top: 20px">注文履歴</h2>
<h3 class="my-2">絞り込み</h3>
<a class="btn btn-primary mb-3" href="{{ route('adminOrder', ['sort' => 0]) }}">未対応</a>
<a class="btn btn-primary mb-3" href="{{ route('adminOrder', ['sort' => 1]) }}">対応済み</a>
<a class="btn btn-primary mb-3" href="{{ route('adminOrder') }}">すべて</a>
{{-- <a class="btn btn-secondary" href="#">注文をグループ化</a> --}}
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th>id</th>
            <th>user_id</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>stock_id</th>
            <th>url</th>
            <th>個数</th>
            <th>合計金額</th>
            <th>注文時間</th>
            <th>status</th>
            <th>ボタン</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $order)
            <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user_id }}</td>
            <td>{{ $order->user->zipcode }}</td>
            <td>{{ $order->user->address }}</td>
            <td>{{ $order->stock_id }}</td>
            @if (isset($order->url))
                <td><a href="{{ $order->url }}">URL</a></td>
            @else
                <td>×</td>
            @endif
            <td>{{ $order->quantity }}個</td>
            <td>{{ number_format($order->fee * $order->quantity) }}円</td>
            <td>{{ $order->created_at }}</td>
            @if ($order->status)
                <td style="color: green">対応済み</td>
                <td>
                    <form action="{{ route('adminOrderStatus') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $order->stock_id }}" name="id">
                    <input class="btn btn-primary text-center" type="submit" value="変更">
                    </form>
                </td>
            @else
                <td style="color: red">未対応</td>
                <td>
                    <form action="{{ route('adminOrderStatus') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $order->stock_id }}" name="id">
                    <input class="btn btn-success text-center" type="submit" value="変更">
                    </form>
                </td>
            @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


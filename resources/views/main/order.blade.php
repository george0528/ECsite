@extends('layouts.mainNoside')
@section('title', '注文履歴')
@section('content')
<div class="main_NScontents_order">
    <h2 class="main_NScontents_order-title">注文履歴</h2>
    @if(isset($data[0]))
    <div class="main_NScontents_order_items">
        @foreach ($data as $item)
        <div class="main_NScontents_order_items_item">
            <div class="main_NScontents_order_items_item_left">
                @if (isset($item->stock->photo[0]))
                    <img src="{{ asset('storage/image/'.$item->stock->photo[0]->imgpath) }}" alt="" class="main_NScontents_order_items_item_left-img">
                @else
                    <img src="{{asset('image/noimg.jpg')}}" alt="" class="main_contents_stock_list_product-img">
                @endif
            </div>
            <div class="main_NScontents_order_items_item_right">
                <p class="text-center">注文日付：{{ $item->created_at }}</p>
                <p class="text-center">商品名：{{ $item->stock->name }}</p>
                <p class="text-center">個数：{{ $item->quantity }}</p>
                <p class="text-center">値段：￥{{ number_format($item->fee) }}</p>
                <p class="text-center">合計：￥{{ number_format($item->fee * $item->quantity) }}</p>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p>注文履歴がありません。</p>
    @endif
</div>
@endsection
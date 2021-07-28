@extends('layouts.mainNoside')
@section('title', '購入完了画面')
@section('content')
<div class="main_NScontents_checkoutafter">
    @if (session('data'))
    <h2 class="main_NScontents_checkoutafter-title">
        購入完了画面
    </h2>
    <div class="main_NScontents_checkoutafter_box">
        <h3 class="main_NScontents_checkoutafter_box-title">{{ Auth::user()->name }}さん、この度はstickerboxでのご購入ありがとうございました。</h3>
        <div class="main_NScontents_checkoutafter_box_list">
            <p class="main_NScontents_checkoutafter_box_list-p">お客様が購入した商品は</p>
            @foreach (session('data')['my_carts'] as $item)
            <div class="main_NScontents_checkoutafter_box_list_product">
                <div class="main_NScontents_checkoutafter_box_list_product_left">
                    @if (isset($item->stock->photo[0]))
                        <img src="{{ asset('storage/image/'.$item->stock->photo[0]->imgpath) }}" alt="" class="main_NScontents_checkoutafter_box_list_product_left-img">
                    @else
                        <img src="{{ asset('image/noimg.jpg') }}" alt="" class="main_NScontents_checkoutafter_box_list_product_left-img">
                    @endif
                </div>
                <div class="main_NScontents_checkoutafter_box_list_product_right">
                    <p class="main_NScontents_checkoutafter_box_list_product_right-p">{{ $item->stock->name }}</p>
                    <p class="main_NScontents_checkoutafter_box_list_product_right-p">{{ $item->quantity }}個</p>
                    <p class="main_NScontents_checkoutafter_box_list_product_right-p">{{ number_format($item->stock->fee*$item->stock->discount->discount*$item->quantity) }}円</p>
                </div>
            </div>
                @endforeach
            <p class="main_NScontents_checkoutafter_box_list-sum">合計金額：<span style="font-size: 1.1rem">{{ number_format(session('data')['sum']) }}</span>円</p>
            <a href="{{ route('index') }}" class="main_NScontents_checkoutafter_box_list-a" style="display: block; font-size:1.2rem">商品一覧へ</a>
        </div>
    </div>
    @include('components.main.content.check_digest')
    @else
    @endif
</div>
@endsection
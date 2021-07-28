@extends('layouts.mainNoside')
@section('title', '商品詳細ページ')
@section('content')
    <div class="main_NScontents_stockDetail">
        <div class="main_NScontents_stockDetail_top">
            <div class="main_NScontents_stockDetail_top_imgs">
                <div class="main_NScontents_stockDEtail_top_imgs_main">
                    @if (isset($item->photo[0]))
                        <img src="{{ asset('storage/image/'.$item->photo[0]->imgpath) }}" alt="" class="main_NScontents_stockDetail_top_imgs_main-img">
                    @else
                        <img src="{{asset('image/noimg.jpg')}}" alt="" class="main_contents_stock_list_product-img">
                    @endif
                </div>
                <div class="main_NScontents_stockDetail_top_imgs_bottoms">
                    <div class="main_NScontents_stockDetail_top_imgs_bottoms_img">
                        @foreach ($item->photo as $photo)
                            <img src="{{ asset('storage/image/'.$photo->imgpath)}}" alt="{{ $item->detail }}" class="main_NScontents_stockDetail_top_imgs_bottoms_img-img">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="main_NScontents_stockDetail_top_contents">
                <h1 class="main_NScontents_stockDetail_top_contents-name">{{ $item->name }}</h1>
                @if ($item->discount->id == 1)
                    <p class="main_NScontents_stockDetail_top_contents-price">￥{{ number_format($item->fee) }}</p>
                @else
                    <div class="main_NScontents_stockDetail_top_contents_discount">
                        <p class="main_NScontents_stockDetail_top_contents_discount-p">通常価格より</p>
                        <p class="main_NScontents_stockDetail_top_contents_discount-percent">{{ $item->discount->percent }}OFF</p>
                        <p class="main_NScontents_stockDetail_top_contents_discount-Bprice">通常価格￥<span>{{ $item->fee }}</span></p>
                    </div>
                    <p class="main_NScontents_stockDetail_top_contents-price discount">￥{{ number_format(($item->fee * $item->discount->discount)) }}</p>
                @endif
                <p class="main_NScontents_stockDetail_top_contents-detail">{{ $item->detail }}</p>
                <form action="{{ route('addmycart') }}" method="POST" class="main_NScontents_stockDetail_top_contents_form">
                    @csrf
                    <input type="hidden" name="stock_id" value="{{ $item->id }}">
                    <div class="main_NScontents_stockDetail_top_contents_form_quantity">
                        <p class="main_NScontents_stockDetail_top_contents_form_quantity-p">数量</p>
                        <select name="quantity" class="main_NScontents_stockDetail_top_contents_form_quantity_select">
                            @for ($i = 1; $i < 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <button class="main_NScontents_stockDetail_top_contents_form-btn" type="submit">カートに追加</button>
                </form>
            </div>
        </div>
    </div>
    @include('components.main.content.content_digest', ['title' => '新着商品', 'datas' => $news, 'link' => route('stockNews', ['sort' => 0])])
    @include('components.main.content.check_digest')
@endsection
@extends('layouts.mainNoside')
@section('title', 'カート')
@section('content')
<div class="main_NScontnts_mycart">
    <h2 class="main_NScontents_mycart-title">ショッピングカート</h2>
    @if (!isset(Auth::user()->address))
        <div class="component">
            <div class="component_alert danger">お届け先の住所が登録されていません。<a href="{{ route('mypage') }}" class="component_alert-a">マイページへ</a></div>
        </div>
    @endif
    @if (session('message'))
        @if (session('flag'))
            <div class="component">
                <div class="component_alert success">{{ session('message') }}</div>
            </div>
        @else
            <div class="component">
                <div class="component_alert danger">{{ session('message') }}</div>
            </div>
        @endif
    @endif
    <div class="main_NScontents_mycart_contents">
        <div class="main_NScontents_mycart_contents_left">
            {{-- 商品があれば --}}
            @if (isset($datas['my_carts'][0]))
                @foreach ($datas['my_carts'] as $cart)
                    <div class="main_NScontents_mycart_contents_left_item">
                        <a href="{{ route('stockDetail', $cart->stock->id) }}" class="main_NScontents_mycart_contents_left_item_img">
                            @if (isset($cart->stock->photo[0]))
                                <img src="{{ asset('storage/image/'.$cart->stock->photo[0]->imgpath) }}" alt="" class="main_NScontents_mycart_contents_left_item_img-img">
                            @else
                                <img src="{{asset('image/noimg.jpg')}}" alt="" class="main_contents_stock_list_product-img">
                            @endif
                        </a>
                        <div class="main_NScontents_mycart_contents_left_item_main">
                            <a href="{{ route('stockDetail', $cart->stock->id) }}" class="main_NScontents_mycart_contents_left_item_main-name">{{ $cart->stock->name }}</a>
                            <p class="main_NScontents_mycart_contents_left_item_main-category">カテゴリ：<a href="{{ route('categoryDetail', $cart->stock->category->id) }}" style="color: gray">{{ $cart->stock->category->name }}</a></p>
                            @if ($cart->stock->discount->id == 1)
                                <p class="main_NScontents_mycart_contents_left_item_main-price">価格：￥<span class="item_price">{{ number_format($cart->stock->fee) }}</span></p>
                            @else
                                <p class="main_NScontents_mycart_contents_left_item_main-price discount">価格：￥<span class="item_price">{{ number_format(($cart->stock->fee * $cart->stock->discount->discount)) }}</span><span class="discount_percent">({{ $cart->stock->discount->percent }}OFF)</span></p>
                                <small class="main_NScontents_mycart_contents_left_item_main-"></small>
                            @endif
                            <form action="{{ route('cartdelete') }}" method="post">
                                @csrf
                                <input type="hidden" name="stock_id" value="{{ $cart->stock->id }}">
                                <button type="submit" class="main_NScontents_mycart_contents_left_item_main-delete">削除</button>
                            </form>
                        </div>
                        <div class="main_NScontents_mycart_contents_left_item_num">
                            <input type="hidden" name="stock_id" value="{{ $cart->stock->id }}">
                            <div class="main_NScontents_mycart_contents_left_item_num_quantity">
                                <p class="main_NScontents_mycart_contents_left_item_num_quantity-p">数量</p>
                                <select name="{{ $cart->stock->id }}" class="main_NScontents_mycart_contents_left_item_num_quantity_select">
                                    @for ($i = 1; $i < 10; $i++)
                                        @if ($cart->quantity == $i)
                                            <option selected value="{{ $i }}">{{ $i }}</option>
                                        @else
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endif
                                    @endfor
                                </select>
                                @if ($cart->stock->discount->id == 1)
                                    <p class="main_NScontents_mycart_contents_left_item_num_quantity-sum">小計：￥<span class="item_price_sum">{{ number_format($cart->stock->fee * $cart->quantity) }}</span></p>
                                @else
                                    <p class="main_NScontents_mycart_contents_left_item_num_quantity-sum">小計：￥<span class="item_price_sum">{{ number_format($cart->stock->fee * $cart->quantity * $cart->stock->discount->discount) }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                {{-- 商品がなければ --}}
                <div class="main_NScontents_mycart_contents_left_none">
                    <p class="main_NScontents_mycart_contents_left_none-p">カート内に商品がありません</p>
                    <a href="{{ route('index') }}" class="main_NScontents_mycart_contents_left_none-backbtn">お買い物を続ける</a>
                </div>
            @endif
        </div>
        @if (isset($datas['my_carts'][0]))
            <div class="main_NScontents_mycart_contents_right">
                <div class="main_NScontents_mycart_contents_right_block">
                    <div class="main_NScontents_mycart_contents_right_block_titles">
                        <p class="main_NScontents_mycart_contents_right_block_titles-left">注文内容</p>
                        <p class="main_NScontents_mycart_contents_right_block_titles-right"><span class="cart_count">{{ $datas['count'] }}</span>件</p>
                    </div>
                    <div class="main_NScontents_mycart_contents_right_block_contents">
                        <div class="main_NScontents_mycart_contents_right_block_contents_content">
                            <p class="main_NScontents_mycart_contents_right_block_contents_content-left">商品合計：</p>
                            <p class="main_NScontents_mycart_contents_right_block_contents_content-rught">￥<span class="cart_sum">{{ number_format($datas['sum']) }}</span></p>
                        </div>
                        <div class="main_NScontents_mycart_contents_right_block_contents_content">
                            <p class="main_NScontents_mycart_contents_right_block_contents_content-left">送料：</p>
                            <p class="main_NScontents_mycart_contents_right_block_contents_content-right">未定</p>
                        </div>
                    </div>
                    <div class="main_NScontents_mycart_contents_right_block_titles">
                        <p class="main_NScontents_mycart_contents_right_block_titles-left">合計：</p>
                        <p class="main_NScontents_mycart_contents_right_block_titles-right">￥<span class="cart_sum">{{ number_format($datas['sum']) }}</span></p>
                    </div>
                </div>
                <div class="main_NScontents_mycart_contents_right_btns">
                    <form action="{{ route('checkout') }}" method="POST">
                        <input type="hidden" name="sum" id='cart_sum-sum' value="{{ $datas['sum'] }}">
                        @csrf
                        {{-- 決済 --}}
                        <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="{{ env('STRIPE_KEY') }}"
                        data-amount="{{ $datas['sum'] }}"
                        data-name="test site"
                        data-label="決済をする"
                        data-description="Online course about integrating Stripe"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto"
                        data-currency="JPY">
                        </script>
                    </form>
                    <a href="{{ route('index') }}" class="main_NScontents_mycart_contents_right_btns-backbtn">お買い物を続ける</a>
                </div>
            </div>
        @endif
    </div>
</div>
@include('components.main.content.check_digest')
@endsection
@php
$contents = [
    [
        'title' => '事業者の名称',
        'p' => "舟山丈太",
    ],
    [
        'title' => '事業者の所在地',
        'p' => "郵便番号 ：5770818
        住所 ：大阪府東大阪市小若江3丁目6-6-101",
    ],
    [
        'title' => '事業者の連絡先',
        'p' => "電話番号 ： 080-8386-0838
        営業時間：9時～21時
        定休日：土日祝",
    ],
    [
        'title' => '販売価格について',
        'p' => "販売価格は、税込み表記となっております。
        また、別途配送料が掛かる場合もございます。配送料に関しては商品詳細ページをご確認ください。",
    ],
    [
        'title' => '代金（対価）の支払方法と時期',
        'p' => "支払方法：クレジットカードによる決済がご利用いただけます。
        支払時期：商品注文確定時にお支払いが確定いたします。",
    ],
    [
        'title' => '役務または商品の引渡時期',
        'p' => "代金のお支払い確定後、5日以内に発送いたします。",
    ],
    [
        'title' => '返品についての特約に関する事項',
        'p' => "商品に欠陥がある場合をのぞき、基本的には返品には応じません。",
    ],
];
@endphp

@extends('layouts.mainNoside')
@section('title', '特定商取引法に基づく表記')
@section('content')
    <div class="main_NScontents_law">
        <h2 class="main_NScontents_law-title">特定商取引法に基づく表示</h2>
        <div class="main_NScontents_law_Bcontent">
            @foreach ($contents as $c)
            <div class="main_NScontents_law_Bcontent_box">
                <h3 class="main_NScontents_law_Bcontent_box-title">{{ $c['title'] }}</h3>
                <p class="main_NScontents_law_Bcontent_box-p">{!! nl2br($c['p']) !!}</p>
            </div>
            @endforeach
        </div>
    </div>
@endsection
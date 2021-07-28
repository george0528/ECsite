<div class="main_contents_digest">
    <div class="main_contents_digest_titles">
        <h2 class="main_contents_digest_titles-title">{{ $title }}</h2>
        <a class="main_contents_digest_titles-link" href="{{ $link }}">{{ $title }}一覧</a>
    </div>
    <div class="main_contents_digest_list">
        @foreach ($datas as $data)
        @isset($data->id)
        <a class="main_contents_digest_list_product" href="{{ route('stockDetail', $data->id) }}">
            @if(isset($data->photo[0]))
                <div class="main_contents_stock_list_product_img"><img src="{{ asset('storage/image/'.$data->photo[0]->imgpath) }}" alt="" class="main_contents_stock_list_product_img-img"></div>
            @else
                <div class="main_contents_stock_list_product_img"><img src="{{asset('image/noimg.jpg')}}" alt="" class="main_contents_stock_list_product_img-img"></div>
            @endif
            <p class="main_contents_digest_list_product-name">{{ $data->name ?? ''}}</p>
            <p class="main_contents_digest_list_product-category">{{ $data->category->name ?? ''}}</p>
            @if ($data->discount->id != 1)
                <p class="main_contents_digest_list_product-fee discount">{{ '￥'.number_format(($data->fee * $data->discount->discount))}}<span>({{ $data->discount->percent }}OFF)</span></p>
            @else
                <p class="main_contents_digest_list_product-fee">{{ '￥'.number_format($data->fee)}}</p>
            @endif
            <div class="main_contents_digest_list_product_icon">
                @if (CarbonController::date()->lt($data->created_at))
                    <span class="main_contents_digest_list_product_icon-new">新着</span>
                @endif
                @if ($data->discount->id != 1)
                    <span class="main_contents_digest_list_product_icon-discount">タイムセール中</span>
                @endif
            </div>
        </a>
        @endisset
        @endforeach
    </div>
</div>
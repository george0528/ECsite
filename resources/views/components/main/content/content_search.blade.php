<div class="main_contents_stock">
    <div class="main_contents_stock_titles">
        <h2 class="main_contents_stock_titles-title">{{ $title }}</h2>
        <p class="main_contents_stock_titles-count">{{ $datas->total() }}件</p>
    </div>
    <div class="main_contents_stock_nav">
        <div class="main_contents_stock_nav_sort">
            <label class="main_contents_stock_nav_sort-label" for="">並び替え</label>
            <select name="sort" id="" class="main_contents_stock_nav_sort_select">
                @php
                    $options = ['新しい順','古い順','価格の安い順','価格の高い順','タイムセール'];
                    $sort = Request::get('sort');
                @endphp
                @for ($i = 0; $i < count($options); $i++)
                    @if (isset($sort) && $sort == $i)
                        <option selected value="{{ $i }}">{{ $options[$i] }}</option>
                    @else
                        <option value="{{ $i }}">{{ $options[$i] }}</option>
                    @endif
                @endfor
            </select>
        </div>
        <div class="main_contents_stock_nav_links">
            @include('components.links')
        </div>
    </div>
    <div class="main_contents_stock_list">
        @foreach ($datas as $data)
        <a class="main_contents_stock_list_product" href="{{ route('stockDetail', $data->id) }}">
            @if(isset($data->photo[0]))
                <div class="main_contents_stock_list_product_img"><img src="{{ asset('storage/image/'.$data->photo[0]->imgpath) }}" alt="" class="main_contents_stock_list_product_img-img"></div>
            @else
                <div class="main_contents_stock_list_product_img"><img src="{{asset('image/noimg.jpg')}}" alt="" class="main_contents_stock_list_product_img-img"></div>
            @endif
            <p class="main_contents_stock_list_product-name">{{ $data->name ?? ''}}</p>
            <p class="main_contents_stock_list_product-category">{{ $data->category->name ?? ''}}</p>
            @if (isset($data->fee))
                @if ($data->discount->id != 1)
                    <p class="main_contents_stock_list_product-fee discount">{{ '￥'.number_format(($data->fee * $data->discount->discount))}}<span>({{ $data->discount->percent }}OFF)</span></p>
                    @else
                    <p class="main_contents_stock_list_product-fee">{{ '￥'.number_format($data->fee)}}</p>
                @endif
            @else
                <p class="main_contents_stock_list_product-fee"></p>
            @endif
            <div class="main_contents_stock_list_product_icon">
                @if (CarbonController::date()->lt($data->created_at))
                    <span class="main_contents_stock_list_product_icon-new">新着</span>
                @endif
                @if ($data->discount->id != 1)
                    <span class="main_contents_stock_list_product_icon-discount">タイムセール中</span>
                @endif
            </div>
        </a>
        @endforeach
    </div>
    @include('components.links')
</div>
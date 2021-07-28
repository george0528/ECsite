<div class="main_contents_categorydigest">
    <div class="main_contents_categorydigest_titles">
        <h2 class="main_contents_categorydigest_titles-title">{{ $title }}</h2>
        {{-- <a class="main_contents_categorydigest_titles-link" href="{{ $link }}">{{ $title }}一覧</a> --}}
    </div>
    <div class="main_contents_categorydigest_list">
        @foreach ($datas as $data)
        <a class="main_contents_categorydigest_list_product" href="{{ route('categoryDetail', $data->id) }}">
            @if(isset($data->imgpath))
                <div class="main_contents_categorydigest_list_product_img"><img src="{{ asset('storage/image/'.$data->imgpath) }}" alt="" class="main_contents_categorydigest_list_product_img-img"></div>
            @else
            <div class="main_contents_categorydigest_list_product_img"><img src="{{asset('image/noimg.jpg')}}" alt="" class="main_contents_categorydigest_list_product_img-img"></div>
            @endif
            <p class="main_contents_categorydigest_list_product-name">{{ $data->name ?? ''}}</p>
        </a>
        @endforeach
    </div>
</div>
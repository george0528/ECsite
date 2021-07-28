<div class="main_side">
    <div class="main_side_block">
        <h3 class="main_side_block-title">カテゴリ</h3>
        <div class="main_side_block_filter">
            @foreach (Category::all() as $category)
                <div class="main_side_block_filter_checkbox">
                    <input class="main_side_block_filter_checkbox-checkbox filter" type="checkbox" name="category[]" id="{{ $category->id }}">
                    <label class="main_side_block_filter_checkbox-label" for="">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="main_side_block">
        <h3 class="main_side_block-title">イベント</h3>
        <div class="main_side_block_list">
            <a href="https://twitter.com/?lang=ja" class="main_side_block_list-item link">公式ツイッターでお得な情報を更新中</a>
        </div>
    </div>
    <div class="main_side_block">
        <h3 class="main_side_block-title">カテゴリから探す</h3>
        <div class="main_side_block_list">
            @foreach (Category::all() as $category)
                <a href="{{ route('categoryDetail', $category->id ) }}" class="main_side_block_list-item">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
    <div class="main_side_block">
        @php
            $prices = [
                ['low' => 0,'up' => 500],
                ['low' => 500,'up' => 1000],
                ['low' => 1000,'up' => 1500],
                ['low' => 1500,'up' => 2000],
                ['low' => 2000,'up' => 2500],
            ]
        @endphp
        <h3 class="main_side_block-title">値段から探す</h3>
        <div class="main_side_block_list">
            @for ($i = 0; $i < count($prices); $i++)
            <a href="{{ route('stockPrice', ['low' => $prices[$i]['low'], 'up' => $prices[$i]['up'], 'sort' => 2]) }}" class="main_side_block_list-item">{{ number_format($prices[$i]['low']).'~'.number_format($prices[$i]['up']).'円' }}</a>
            @endfor
        </div>
    </div>
</div>
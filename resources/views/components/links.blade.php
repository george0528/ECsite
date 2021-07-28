<div class="component_links">
    @if ($datas->total() == 0)
        <p class="component_links-message">商品が見つかりませんでした。</p>
    @else
        <p class="">{{ $datas->firstItem() }} ~ {{ $datas->lastItem() }}</p>
        <div class="component_links_btns">
            <a class="component_links_btns-btn btn-black" href="{{ $datas->appends(request()->query())->url(1) }}"><<</a>
            <a class="component_links_btns-btn btn-black" href="{{ $datas->previousPageUrl() }}"><</a>
            @for ($i = 1; $i <= $datas->lastPage(); $i++)
                @if ($datas->currentPage() == $i)
                    <a class='component_links_btns-btn current' href="{{ $datas->url($i) }}">{{ $i }}</a>
                @else
                    <a class='component_links_btns-btn' href="{{ $datas->url($i) }}">{{ $i }}</a>
                @endif
            @endfor
            <a class="component_links_btns-btn btn-black" href="{{ $datas->nextPageUrl() }}">></a>
            <a class="component_links_btns-btn btn-black" href="{{ $datas->url($datas->lastPage()) }}">>></a>
        </div>
    @endif
</div>
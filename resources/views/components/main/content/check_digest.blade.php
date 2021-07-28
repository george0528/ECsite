@isset($_COOKIE['items'][0])
    @php
        $cookieC = new CookieController;
        $datas = $cookieC->getStock(5);
    @endphp
        @include('components.main.content.content_digest', ['title' => '閲覧履歴', 'datas' => $datas, 'link' => route('stockCheck')])
@endisset

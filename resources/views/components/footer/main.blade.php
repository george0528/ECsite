</main>
<footer class="footer">
    <div class="footer_main">
        <div class="footer_main_menu">
            <div class="footer_main_menu_block">
                <h3 class="footer_main_menu_block-title">探す</h3>
                <div class="footer_main_menu_block_list">
                @foreach (Category::all() as $category)
                    <a href="{{ route('categoryDetail', $category->id ) }}" class="footer_main_menu_block_list-item">{{ $category->name }}</a>
                @endforeach
                <a href="{{ route('stockDiscount')}}" class="footer_main_menu_block_list-item">ランキング</a>
                <a href="{{ route('stockNews')}}" class="footer_main_menu_block_list-item">新着商品</a>
                <a href="{{ route('stockDiscount')}}" class="footer_main_menu_block_list-item">タイムセール</a>                </div>
            </div>
            <div class="footer_main_menu_block">
                <h3 class="footer_main_menu_block-title">ヘルプ</h3>
                <div class="footer_main_menu_block_list">
                    <a href="{{ route('index')}}" class="footer_main_menu_block_list-item">ログインについて</a>
                    <a href="{{ route('index')}}" class="footer_main_menu_block_list-item">送料について</a>
                    <a href="{{ route('index')}}" class="footer_main_menu_block_list-item">返品・交換について</a>
                    <a href="{{ route('index')}}" class="footer_main_menu_block_list-item"></a>
                </div>
            </div>
        </div>
        <div class="footer_main_sentence">
            <p class="footer_main_sentence-content">stickerbox（ステッカーボックス）とは<br>
                stickerboxは可愛いからかっこいいまで、幅広いジャンルのステッカーをまとめて購入できるステッカー通販サイトです。最新のステッカーを取り揃え、様々なお支払い方法にてお買い求めいただけます。お得なセールやイベントも365日毎日開催しておりますので、是非ステッカー通販サイトstickerboxでのお買い物をお楽しみください！</p>
        </div>
        <div class="footer_main_law">
            <p class="footer_main_law-p">stickerboxについて：
                <a href="{{ route('index') }}" class="footer_main_law-p-a">よくある質問</a>
                <a href="{{ route('index') }}" class="footer_main_law-p-a">利用規約</a>
                <a href="{{ route('law', 3) }}" class="footer_main_law-p-a">特定商取引法に基づく表示</a>
                <a href="{{ route('law', 4) }}" class="footer_main_law-p-a">プライバシーポリシー</a>
            </p>
        </div>
        <div class="footer_main_bottom">
            <p class="footer_main_bottom-p">copyright © 2021 stickerbox</p>
        </div>
    </div>
</footer>
<script src="{{ asset('js/header.js') }}"></script>
</body>
</html>
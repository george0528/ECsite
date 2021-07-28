(function () {


// 定義
const $header = document.querySelector('.header_navbar');
const $headerSpace = document.querySelector('#header-space');
const $mainSide = document.querySelector('.main_side');
const $sideCover = document.querySelector('#side-cover');
const $bars = document.querySelector('.header_navbar_right_bars');
const $user = document.querySelector('.header_navbar_right_user_menu');
const $drop = document.querySelector('.header_navbar_right_user_menu_drop');
const $logout = document.querySelector('.header_navbar_right_user_menu_drop-logout');
const $form = document.querySelector('.header_navbar_right_user_menu_drop-form');
const $slide = document.querySelector('.main_contents_slide-img');
const $mainSortSelect = document.querySelector('.main_contents_stock_nav_sort_select');
const $cartSelect = document.querySelectorAll('.main_NScontents_mycart_contents_left_item_num_quantity_select');
const $sideFilters = document.querySelectorAll('.main_side_block_filter_checkbox-checkbox');
const $cartSums = document.querySelectorAll('.cart_sum');
const $cartCount = document.querySelector('.cart_count');
const $cartItems = document.querySelectorAll('.main_NScontents_mycart_contents_left_item');
let $token = document.querySelector('meta[name="csrf-token"]').content;
const $stock_imgs = document.querySelectorAll('.main_NScontents_stockDetail_top_imgs_bottoms_img-img');
const $submitBtns = document.querySelectorAll('button[type="submit"]');
// ヘッダーの高さ計算
window.onload = () => {
    if($header) {
        heightSpace();
        window.scrollTo(0,0);
        // リサイズ
        window.addEventListener('resize', () => {
            heightSpace();
        });
    }
}
// スライドショー
// let i = 0;
// if($slide) {
//     setInterval(() => {
//         if(i == 0) {
//             $slide.src = '/image/slide1.png';
//             i++;
//         } else {
//             $slide.src = '/image/slide2.png';
//             i = 0;
//         }
//     }, 2000);
// }



// クリックイベント
// 二重送信防止 btn　submit 
if($submitBtns[0]) {
    $submitBtns.forEach(elem => {
        elem.addEventListener('click', (e) => {
            // e.preventDefault();
            var text = elem.textContent;
            var result = window.confirm(`${text}しますがよろしいでしょうか`);
            if(!result) {
                e.preventDefault();
            }
        });
    });
}
// ハンバーガーメニュー
if($bars && $mainSide) {
    $bars.addEventListener('click', (e) => {
        toggleSide();
    });
    if($sideCover) {
        $sideCover.addEventListener('click', (e) => {
            toggleSide();
        });
    }
}
// ユーザーメニュー
if($user) {
    $user.addEventListener('click', () => {
        $drop.classList.toggle('open');
    });
}
// ログアウト
if($logout) {
    $logout.addEventListener('click', (e) => {
        e.preventDefault();
        $form.submit();
    });
}
// 商品詳細　画像クリック
if($stock_imgs[0]) {
    $stock_imgs[0].classList.add('select');
    const $product_img = document.querySelector('.main_NScontents_stockDetail_top_imgs_main-img');
    $stock_imgs.forEach(element => {
        element.addEventListener('click', (e) => {
            let $selectImg = document.querySelector('.main_NScontents_stockDetail_top_imgs_bottoms_img').querySelector('.select');
            $src = e.currentTarget.src;
            $product_img.src = $src;
            $selectImg.classList.remove('select');
            e.currentTarget.classList.add('select');
        });
    });
}
// ソート変更イベント
if($mainSortSelect) {
    $mainSortSelect.addEventListener('change', () => {
        let url = location.href.split('?')[0];
        const params = new URLSearchParams(location.search);
        url += `?sort=${$mainSortSelect.value}`;
        // クエリパラメータを取り出し
        for (let param of params) {
            // キーがソートではない場合
            if(param[0] != 'sort') {
                url += `&${param[0]}=${param[1]}`;
            }
        }
        window.location.href = url;
    });
}
// カート数量変更イベント
$cartSelect.forEach(element => {
    element.addEventListener('change', () => {
        apiCart(element);
        changeSum();
    });
});

// 絞り込み
if($sideFilters) {
    let url = location.href.split('?')[0];
    // カテゴリー
    let filterCs = [];
    // プライス
    let filterPs = [];
    // キーワード
    let filterKs = [];
    $sideFilters.forEach(element => {
        element.addEventListener('change', (e) => {
            getFilter();
        });
    });
}



// 関数
// 商品別合計金額変更　関数
const changeSum = () => {
    $cartItems.forEach(item => {
        let $price = item.querySelector('.item_price').textContent.split(',').join('');
        let $sum = item.querySelector('.item_price_sum');
        let $quantity = item.querySelector('select').value;
        let sum = Number($price) * Number($quantity);
        $sum.textContent = sum.toLocaleString();
    });
}
// ハンバーガーメニューのopen&close 関数
const toggleSide = () => {
    $bars.classList.toggle('close');
    $mainSide.classList.toggle('open');
    $sideCover.classList.toggle('open');
}

// 絞り込み関数
const getFilter = () => {
    $sideFilters.forEach(element => {
        if(element.name == 'category[]') {
            // フィルター
        } else if(element.name == 'price[]') {
            // フィルター
        }
    });
}

// ヘッダーの高さを求める関数
const heightSpace = () => {
    var height = String($header.clientHeight) + 'px';
    $headerSpace.style.height = height;
}


// Ajax
// apiCart関数
const apiCart = (element) => {
    let itemId = element.name;
    let itemQuantity = element.value;
    console.log(`itemID=${itemId}`);
    console.log(`itemquantity=${itemQuantity}`);
    fetch(`/ajax/cart`, set(itemId,itemQuantity))
    .then(response => {
        return response.json();
    })
    .then(json => {
        console.log(json);
        $cartSums.forEach(elem => {
            elem.textContent = json['sum'].toLocaleString();
            var inputSum = document.querySelector('#cart_sum-sum');
            inputSum.value = json['sum'];
        });
        $cartCount.textContent = json['count'];
    })
    .catch(error => {
        console.log('エラー：'+error);
    });
}

// api設定
const set = (itemId,itemQuantity) =>{
    let setting = {
        headers: {
            "X-CSRF-TOKEN" : $token,
            "Content-Type" : 'application/json'
        },
        method: "post",
        body : JSON.stringify({
            'itemId' : itemId,
            'itemQuantity' : itemQuantity
        })
    }
    return setting;
}






}());

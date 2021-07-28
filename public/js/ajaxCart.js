(function() {

// 変数　定義
const $sum = document.querySelector('#sum');
const $count = document.querySelector('#count');
const $selects = document.querySelectorAll('.select');
let $token = document.querySelector('meta[name="csrf-token"]').content;
// ajax

// 変更イベント
$selects.forEach(element => {
    element.addEventListener('change', () => {
        api(element);
    });
});

// イベント　api関数
const api = (element) => {
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
        $sum.textContent = json['sum'];
        $count.textContent = json['count'];
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





}())


(function() {


// 変数定義
const $btn = document.querySelector('#btn');
const $select = document.querySelector('#select');
const $category = document.querySelector('#newCategory');
const $box = document.querySelector('#messagebox');
const $options = document.querySelectorAll('option');
let flag;
// クリックイベント
if($btn) {
    $btn.addEventListener('click', () => {
        console.log($category.value);
        if($category.value != '' && $category.value != '　' && $category.value != ' ') {
            api($category.value);
        } 
    });
}

// 関数
const api = (name) => {
    fetch(`/ajax/category/?name=${name}`)
        .then(response => {
            return response.json();
        })
        .then(json => {
            console.log(json);
            createElement(json.id, name);
        })
        .catch(error => {
            console.log('エラー：'+error);
        });
}

// 要素作成関数
const createElement = (id, content) => {
    optionCheck(id);
    $elem = $box.querySelector('.alert');
    // メッセージを削除
    if($elem) {
        $elem.remove();
    }
    // メッセージの設定
    let $message = document.createElement('p');
    $message.classList.add('alert');
    // カテゴリーがすでにあるかどうか
    if(flag) {
        let $option = document.createElement('option');
        $option.textContent = content;
        $option.value = id;
        $select.appendChild($option);
        $category.value = '';
        $message.textContent = 'カテゴリーを追加しました';
        $message.classList.add('alert-success');
    } else {
        $message.textContent = 'そのカテゴリーはすでに存在しています';
        $message.classList.add('alert-danger');
    }
    $box.appendChild($message);
}

// optionの存在チェック関数
const optionCheck = (id) => {
    flag = true;
    $options.forEach(element => {
        let $value = element.value;
        if($value == id) {
            flag = false;
        }
    });
}







}())


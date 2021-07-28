(function() {

// 定義
const $showDiv = document.querySelector('.main_NScontents_login_box_form_show');
const $password = document.querySelector('#login_password');
const $passwordBtn = document.querySelector('.main_NScontents_login_box_form_show-checkbox');

// クリックイベント
if($showDiv) {
    $showDiv.addEventListener('click', (e) => {
        if(e.target != $passwordBtn) {
            $passwordBtn.checked = !$passwordBtn.checked;
        }
        if($passwordBtn.checked) {
            $password.type = 'text';
        } else {
            $password.type = 'password';
        }
    });
}






}());
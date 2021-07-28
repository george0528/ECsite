<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class CookieController extends Controller
{
    // クッキーに閲覧履歴をセット
    public function setStock($id) {
        // 配列を作る
        // Cookie存在チェック
        if(isset($_COOKIE['items'])) {
            // jsonを配列に戻す
            $ary = json_decode($_COOKIE['items']);
            // 重複チェック
            $ary = array_diff($ary, array($id));
            // 個数制限の処理    切り取る
            $ary = array_slice($ary, 0, 20);
            // 配列詰める
            $ary = array_values($ary);
        } else {
            // 新しい配列を作る
            $ary = [];
        }
        // 配列の先頭に追加する
        array_unshift($ary, $id);
        // jsonにする
        $ary = json_encode($ary, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        // Cookieを上書き
        setcookie("items", $ary, time() + (365 * 24 * 60 * 60), '/');
    }
    // 閲覧履歴を取得
    public function getStock($int) {
        $ary = json_decode($_COOKIE['items']);
        $datas = [];
        $i = 0;
        $stock = new Stock();
        foreach ($ary as $id) {
            if($i >= $int) {
                return $datas;
            }
            $datas[] = $stock->stock()->find($id);
            $i++;
        }
        return $datas;
    }
}

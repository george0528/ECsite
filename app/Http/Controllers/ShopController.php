<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Svg\Tag\Rect;

// 変数定義

class ShopController extends Controller
{
    public $page = 10;
    // テスト
    public function test(MailSendController $mail, Cart $cart) {
        $data = $cart->showCart();
        return redirect(route('checkoutafter'))->with('data', $data);
    //     $data = [
    //         'email' => 'aleph0528@gmail.com',
    //         'name' => 'testuser',
    //     ];
    //     $mail->test($data);
    //     return redirect(route('index'))->with('message', 'メールを送信しました');
    }
    /**
     * トップ画面表示
     * 
     * @return view
     */
    public function index(Stock $stock, Category $category,Request $request) {
        $news = $stock->stock()->orderBy('created_at', 'desc')->take(5)->get();
        $rankings = $stock->stock()->take(5)->get();
        $discounts = $stock->stock()->where('discount_id', '>', 1)->take(5)->get();
        $categories = $category->take(5)->get();
        return view('main.index', compact('news', 'rankings', 'categories', 'discounts'));
    }
    /**
     * 商品の詳細ページ
     * @param int $id
     * @return view
     */
    public function stockDetail($id, Stock $stock, Request $request, CookieController $cookieController) {
        // クッキー
        $cookieController->setStock($id);
        // dd(Cookie::get('items'));
        // Cookie::queue('key', 'aaaaaa');
        // dd(Cookie::get('key'));
        $item = $stock->stock()->find($id);
        $news = $stock->stock()->orderBy('created_at', 'desc')->take(5)->get();
        return view('main.stock_detail', compact('item','news'));
    }
    /**
     * カート画面表示
     * 
     * @return view
     */
    public function mycart(Cart $cart, Request $request) {
        $datas = $cart->showCart();
        return view('main.mycart', compact('datas'));
    }
    /**
     * カートに追加
     * 
     * @param int $stock_id
     * @return view
     */
    public function addMycart(Request $request,Cart $cart) {
        $cart_add_info = $cart->addCart($request);
        if($cart_add_info->wasRecentlyCreated){
            $message = 'カートに追加しました';
            $flag = true;
        }
        else{
            $message = 'カートに登録済みです';
            $flag = false;
        }
        return redirect(route('mycart'))->with('message', $message)->with('flag', $flag);
    }
    /**
     * カテゴリーの詳細を表示
     * 
     * @param int $id
     * @return view
     */
    public function categoryDetail($id,Stock $stock,Category $category,Request $request) {
        $stocks = $stock->categoryDetail($id,$request);
        $stocks = $stocks->paginate($this->page);
        $categoryName = $category->find($id)->name;
        return view('main.category', compact('stocks', 'categoryName'));
    }
    /**
     * 新着商品
     * @return view
     */
    public function news(Stock $stock,Request $request) {
        $stocks = $stock->sort($request)->paginate($this->page);
        $title = '新着商品';
        return view('main.list', compact('stocks','title'));
    }
    /**
     * 値段別商品　表示
     * 
     */
    public function price(Stock $stock,Request $request) {
        $low = number_format($request->low);
        $up = number_format($request->up);
        $title = "${low}～${up}円";
        $stocks = $stock->price($request)->paginate($this->page);
        return view('main.list', compact('stocks', 'title'));
    }
    /**
     * タイムセールを表示
     */
    public function discount(Stock $stock, Request $request) {
        $stocks = $stock->sort($request)->where('discount_id', '>', 1)->paginate($this->page);
        $title = 'タイムセール';
        return view('main.list', compact('stocks', 'title'));
    }
    /**
     * 閲覧履歴を表示
     */
    public function check(CookieController $cookieController) {
        $stocks = $cookieController->getStock(20);
        $title = '閲覧履歴';
        return view('main.checkitems', compact('stocks', 'title'));
    }
    /**
     * カートから削除
     * 
     * @param 
     * @return view
     */
    public function deleteCart(Request $request,Cart $cart) {
        $stock_id = $request->stock_id;
        $cart_delete_info = $cart->deleteItem($stock_id);
        if($cart_delete_info > 0) {
            $message = 'カートから商品を削除しました。';
        } else {
            $message = '商品の削除に失敗しました';
        }
        return redirect(route('mycart'))->with('message', $message);
    }
    /**
     * 購入後の画面
     * 
     * @return view
     */
    public function checkoutafter() {
        return view('main.checkout');
    }
    /**
     * 検索結果を表示
     * 
     * @param string $keyword
     * @return view
     */
    public function search(Request $request, Stock $stock) {
        $request->validate([
            'keyword' => ['required']
        ]);
        $stocks = $stock->search($request)->paginate($this->page);
        $keyword = $request->keyword;
        return view('main.search', compact('stocks','keyword'));
    }
    /**
     * マイページを表示
     * @return view
     */
    public function mypage() {
        $data = Auth::user();
        return view('main.mypage', compact('data'));
    }
    /**
     * マイページ変更フォーム
     * @return view
     */
    public function mypageForm() {
        $data = Auth::user();
        return view('main.mypage_edit', compact('data'));
    }
    /**
     * マイページを変更
     * @param array $request
     * @return view
     */
    public function changeMypage(Request $request,User $user) {
        // DB操作
        $user->change($request);
        return redirect(route('index'));
    }
    /**
     * 注文履歴を表示
     * 
     * @return view
     */
    public function showOrder(Order $order) {
        $data = $order->showOrder();
        return view('main.order', compact('data'));
    }
    /**
     * 規約系
     *
     */
    public function law($id) {
        if(empty($id)) {
            $id = 1;
        }
        switch($id) {
            case 1:
                // よくある質問を返す
                break;
            case 2:
                // 利用規約を返す
                // return view();
                break;
            case 3:
                // 特定商取引法を返す
                return view('law.pp');
                break;
            case 4:
                return view('law.p');
                break;
        }
    }
}

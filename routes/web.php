<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// トップ画面
Route::get('/', [ShopController::class, 'index'])->name('index');
// 検索画面
Route::get('/search', [ShopController::class, 'search'])->name('search');
// 商品の詳細ページ
Route::get('/stock/detail/{id}', [ShopController::class, 'stockDetail'])->name('stockDetail');
// カテゴリー一覧
Route::get('/category', [ShopController::class, 'category'])->name('category');
// カテゴリー詳細
Route::get('/category/detail/{id}', [ShopController::class, 'categoryDetail'])->name('categoryDetail');
// 商品新着順
Route::get('/stock/news', [ShopController::class, 'news'])->name('stockNews');
// 値段
Route::get('/stock/price', [ShopController::class, 'price'])->name('stockPrice');
// タイムセールを表示
Route::get('/stock/discount', [ShopController::class, 'discount'])->name('stockDiscount');
// 閲覧履歴
Route::get('/stock/check', [ShopController::class, 'check'])->name('stockCheck');


// 規約系
Route::get('/law/{id}', [ShopController::class, 'law'])->name('law');




// ログイン時
Route::group(['middleware' => ['auth']], function () {
    // カート
    Route::get('/mycart', [ShopController::class, 'mycart'])->name('mycart');
    // カートに追加
    Route::post('/mycart', [ShopController::class, 'addMycart'])->name('addmycart');
    // カートから削除
    Route::post('/cartdelete', [ShopController::class, 'deleteCart'])->name('cartdelete');
    // 購入
    Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    // 購入後画面
    Route::get('/checkoutafter', [ShopController::class, 'checkoutafter'])->name('checkoutafter');
    // マイページ
    Route::get('/mypage', [ShopController::class, 'mypage'])->name('mypage');
    // マイページ変更フォーム
    Route::get('/mypage/edit', [ShopController::class, 'mypageForm'])->name('mypageForm');
    // マイページ変更
    Route::post('/mypage/edit/submit', [ShopController::class, 'changeMypage'])->name('changeMypage');
    // 注文履歴画面
    Route::get('/order', [ShopController::class, 'showOrder'])->name('showorder');
});


// テスト
Route::get('/test', [ShopController::class, 'test'])->name('test');




// 管理画面
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('adminIndex');
    // 商品追加フォーム
    Route::get('/admin/createform', [AdminController::class, 'createForm'])->name('adminCreateForm');
    // 商品追加
    Route::post('/admin/create', [AdminController::class, 'create'])->name('adminCreate');
    // 商品編集
    Route::post('/admin/edit', [AdminController::class, 'edit'])->name('adminEdit');
    // 商品編集画面
    Route::get('/admin/edit/{id}', [AdminController::class, 'editForm'])->name('adminEditForm');
    // 商品削除
    Route::post('/admin/delete', [AdminController::class, 'delete'])->name('adminDelete');
    // 注文を表示
    Route::get('/admin/order', [AdminController::class, 'order'])->name('adminOrder');
    // 注文の状態を変更
    Route::post('/admin/order/status', [AdminController::class, 'orderStatus'])->name('adminOrderStatus');
    // カテゴリーを表示
    Route::get('/admin/category', [AdminController::class, 'category'])->name('adminCategory');
    // カテゴリー削除
    Route::post('/admin/category/delete', [AdminController::class, 'deleteCategory'])->name('adminDeleteCategory');
    // カテゴリー編集
    Route::post('/admin/category/edit', [AdminController::class, 'editCategory'])->name('adminEditCategory');
    // カテゴリー編集フォーム
    Route::get('/admin/category/edit/{id}', [AdminController::class, 'editCategoryForm'])->name('adminEditCategoryForm');
    // 写真を表示
    Route::get('/admin/photo', [AdminController::class, 'photo'])->name('adminPhoto');
    // 写真を追加するフォーム
    Route::get('/admin/photo/form', [AdminController::class, 'photoForm'])->name('adminPhotoForm');
    // 写真を追加
    Route::post('/admin/photo/add', [AdminController::class, 'photoAdd'])->name('adminPhotoAdd');
    // 写真を削除
    Route::post('/admin/photo/delete', [AdminController::class, 'photoDelete'])->name('adminPhotoDelete');
    // 割引を表示
    Route::get('/admin/discount', [AdminController::class, 'discount'])->name('adminDiscount');
    // 割引追加フォーム
    Route::get('/admin/discount/form', [AdminController::class, 'discountForm'])->name('adminDiscountForm');
    // 割引を追加
    Route::post('/admin/discount/add', [AdminController::class, 'discountAdd'])->name('adminDiscountAdd');
    // 割引を削除
    Route::post('/admin/discount/delete', [AdminController::class, 'discountDelete'])->name('adminDiscountDelete');
    // タグを表示
    Route::get('/admin/tag', [AdminController::class, 'tag'])->name('adminTag');
    // タグ追加フォーム
    Route::get('/admin/tag/form', [AdminController::class, 'tagForm'])->name('adminTagForm');
    // タグの追加
    Route::post('/admin/tag/add', [AdminController::class, 'tagAdd'])->name('adminTagAdd');
    // タグの削除
    Route::post('/admin/tag/delete', [AdminController::class, 'tagDelete'])->name('adminTagDelete');
    // 商品の販売状態を変更
    Route::post('/admin/stock/status/change', [AdminController::class, 'status'])->name('adminStatus');
    // 商品の一括操作
    Route::post('/admin/stock/all/control', [AdminController::class, 'allControl'])->name('adminAllControl');
});


// Ajax処理
// カートの数を変更
Route::post('/ajax/cart', [AjaxController::class, 'cartApi'])->name('cartApi');
//　カテゴリー追加
Route::get('/ajax/category', [AjaxController::class, 'categoryCreate'])->name('categoryCreate');









Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
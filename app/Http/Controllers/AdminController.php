<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Photo;
use App\Models\Tag;
use App\Models\Tagmap;


class AdminController extends Controller
{
    // ホーム画面
    public function index(Stock $stock) {
        $items = $stock->all();
        return view('admin.dashboard', compact('items'));
    }
    // 商品追加画面
    public function createForm(Category $category,Discount $discount, Tag $tag) {
        $categories = $category->all();
        $discounts = $discount->all();
        $tags = $tag->all();
        return view('admin.create_form', compact('categories', 'discounts', 'tags'));
    }
    // 商品追加
    public function create(Request $request,Stock $stock,Photo $photo,Tagmap $tagmap) {
        // 写真のファイル取得
        $imgs = $request->file('imgpath');
        // 商品追加
        $new = $stock->createItem($request);
        // 写真を追加
        $photo->addPhoto($new->id,$imgs);
        // タグを追加
        $tags = $request->tags;
        $tagmap->createTags($tags, $new->id);
        return redirect(route('adminIndex'))->with('message', '商品を追加しました');
    }
    // 商品編集画面
    public function editForm($id, Stock $stock, Category $category, Discount $discount, Tag $tag) {
        // DB操作
        $data = $stock->find($id);
        $categories = $category->all();
        $discounts = $discount->all();
        $tags = $tag->all();
        return view('admin.update_form', compact('data', 'id', 'categories', 'discounts', 'tags'));
    }
    // 商品編集
    public function edit(Request $request, Stock $stock,Tagmap $tagmap) {
        // DB操作
        $stock->editItem($request);
        $tagmap->editTags($request);
        return redirect(route('adminIndex'))->with('message', '商品を編集しました');
    }
    // 商品を削除
    public function delete(Request $request,Stock $stock, Photo $photo, Tagmap $tagmap) {
        // DB操作
        $stock_id = $stock->deleteItem($request);
        $photo->deletePhotos($stock_id);
        $tagmap->deleteTags($stock_id);
        return redirect(route('adminIndex'))->with('message', '商品を削除しました');
    }
    // 注文を表示
    public function order(Order $order,Request $request) {
        // DB操作
        if(isset($request->sort)) {
            $data = $order->sort($request->sort);
        }else {
            $data = $order->all();
        }
        return view('admin.order', compact('data'));
    }
    // 注文の状態を変更
    public function orderStatus(Request $request, Order $order) {
        $order_id = $request->id;
        // 状態を反転
        $order->changeStatus($order_id);
        return redirect(route('adminOrder'))->with('message', $order_id.'の販売状態を変更しました。');
    }
    // カテゴリーを表示
    public function category(Category $category) {
        // DB操作
        $data = $category->all();
        return view('admin.category', compact('data'));
    }
    // カテゴリーを削除
    public function deleteCategory(Request $request, Category $category) {
        $category_id = $request->id;
        $category->destroy($category_id);
        return redirect(route('adminCategory'))->with('message', 'カテゴリーを削除しました');
    }
    // カテゴリーの編集フォームを表示
    public function editCategoryForm($id,Category $category) {
        $data = $category->find($id);
        return view('admin.category_edit_form', compact('data'));
    }
    // カテゴリーを編集
    public function editCategory(Request $request, Category $category) {
        // DB操作
        $result = $category->edit($request);
        if($result) {
            $message = 'カテゴリーの編集に成功しました。';
        } else {
            $message = 'カテゴリーの編集に失敗しました。';
        }
        return redirect(route('adminCategory'))->with('message', $message);
    }
    // 写真を表示
    public function photo(Photo $photo, Request $request) {
        // 並び替え
        $sort = $request->sort;
        if(isset($sort)) {
            // DB操作
            if($sort == 1) {
                $photos = $photo->orderBy('stock_id', 'asc')->get();
            } else {
                $photos = $photo->all();
            }
        } else {
            // DB操作
            $photos = $photo->all();
        }
        return view('admin.photo', compact('photos'));
    }
    // 写真の追加フォーム
    public function photoForm(Stock $stock) {
        $datas = $stock->all();
        return view('admin.photo_add_form', compact('datas'));
    }
    // 写真を追加
    public function photoAdd(Request $request, Photo $photo) {
        $stock_id = $request->stock_id;
        $imgs = $request->file('imgpath');
        $photo->addPhoto($stock_id,$imgs);
        return redirect(route('adminPhoto'))->with('message', '写真を追加しました');
    }
    // 写真を削除
    public function photoDelete(Request $request, Photo $photo) {
        $photo_id = $request->photo_id;
        $data = $photo->find($photo_id);
        $photo->deletePhoto($data);
        return redirect(route('adminPhoto'))->with('message', '写真を削除しました');
    }
    // 割引を表示
    public function discount(Discount $discount) {
        $discounts = $discount->all();
        return view('admin.discount', compact('discounts'));
    }
    // 割引を追加フォーム
    public function discountForm() {
        return view('admin.discount_form');
    }
    // 割引を追加
    public function discountAdd(Request $request, Discount $discount) {
        $discount->addDiscount($request);
        return redirect(route('adminDiscount'))->with('message', '新しい割引を追加しました');
    }
    public function discountDelete(Request $request, Discount $discount) {
        $discount_id = $request->discount_id;
        $discount->destroy($discount_id);
        return redirect(route('adminDiscount'))->with('message', '割引を削除しました');
    }
    // タグを表示
    public function tag(Tag $tag) {
        $tags = $tag->all();
        return view('admin.tag', compact('tags'));
    }
    // タグ追加フォーム
    public function tagForm() {
        return view('admin.tag_form');
    }
    // タグを追加
    public function tagAdd(Request $request, Tag $tag) {
        $name = $request->name;
        $tag->create([
            'name' => $name
        ]);
        return redirect(route('adminTag'))->with('message', 'タグを追加しました');
    }
    // タグの削除
    public function tagDelete(Request $request, Tag $tag) {
        $tag_id = $request->tag_id;
        $tag->destroy($tag_id);
        return redirect(route('adminTag'))->with('message', 'タグを削除しました');
    }
    // 販売状態変更
    public function status(Request $request, Stock $stock) {
        $stock_id = $request->id;
        // 状態を反転
        $stock->changeStatus($stock_id);
        return redirect(route('adminIndex'))->with('message', $stock_id.'の販売状態を変更しました。');
    }
    // 一括操作
    public function allControl(Request $request, Stock $stock, Photo $photo, Tagmap $tagmap) {
        $checks = $request->checkbox;
        $btn = $request->btns;
        $message = '';
        if(isset($checks)) {
            // クリックされたボタンがstatusなら
            if($btn == 'status') {
                foreach($checks as $c) {
                    $stock->changeStatus($c);
                    $message = $message.$c.',';
                }
                return redirect(route('adminIndex'))->with('message', 'id　['.$message.']　の販売状態を変更しました。');
            }
            // 削除
            if($btn == 'delete') {
                foreach($checks as $c) {
                    $s = $stock->find($c);
                    $stock_id = $stock->deleteItem($s);
                    $photo->deletePhotos($stock_id);
                    $tagmap->deleteTags($stock_id);
                    $message = $message.$c.',';
                }
                return redirect(route('adminIndex'))->with('message', 'id　['.$message.']　が削除されました。')->with('flag', 'danger');
            }
            // ダミー
            if($btn == 'dummy') {
                foreach($checks as $c) {
                    $message = $message.$c.',';
                }
                return redirect(route('adminIndex'))->with('message', 'id　['.$message.']　が選択されダミーボタンが押されました。')->with('flag', 'danger');
            }
        } else {
            return redirect(route('adminIndex'))->with('message', '商品が選択されていません')->with('flag', 'danger');
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;

class Stock extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    // 販売中の商品をとる
    public function stock() {
        return $this->where('status', true);
    }
    // 並び替えを決める
    public function sort($request) {
        if(empty($request->sort)) {
            $sort = 0;
        } else {
            $sort = $request->sort;
        }
        switch($sort) {
            // 新しい順
            case 0:
                return $this->stock()->orderBy('created_at', 'desc');
                break;
            // 古い順
            case 1:
                return $this->stock()->orderBy('created_at', 'asc');
                break;
            // 価格の安い順
            case 2:
                return $this->stock()->orderBy('fee', 'asc');
                break;
            // 価格の高い順
            case 3:
                return $this->stock()->orderBy('fee', 'desc');
                break;
            // タイムセール
            case 4:
                return $this->stock()->where('discount_id', '>', 1);
            // デフォルト
            default:
            return $this->stock()->orderBy('created_at', 'desc');
        }
    }
    // カテゴリー絞り込み
    public function categoryDetail($id,$request) {
        $stocks = $this->sort($request);
        $stocks = $stocks->where('category_id', $id);
        return $stocks;
    }
    // 検索
    public function search($request) {
        // 並び替え
        $stocks = $this->sort($request);
        // 検索キーワードを取得
        $key = $request->keyword;
        // キーワードをもとに検索
        $stocks = $stocks->where('name', 'like', "%${key}%");
        return $stocks;
    }
    // 値段で絞り込み
    public function price($request) {
        $low = $request->low;
        $up = $request->up;
        return $this->sort($request)->whereBetween('fee', [$low,$up]);
    }
    // 商品作成
    public function createItem($request) {
        // urlがセットされているか
        if(isset($request->url)) {
            $data = $request->only(['name', 'detail', 'fee', 'category_id','url']);
        } else {
            $data = $request->only(['name', 'detail', 'fee', 'category_id']);
        }
        $new = $this->create($data);
        return $new;
    }
    // 商品編集
    public function editItem($request) {
        $id = $request->id;
        // リクエストから変更情報を取得
        $data = $request->only(['name', 'detail', 'fee', 'category_id','discount_id']);
        // 商品を探す
        $items = $this->find($id);
        // 商品の内容を変更
        $items->fill($data);
        // 変更確定
        $items->save();
    }
    // 商品削除
    public function deleteItem($request) {
        $stock_id = $request->id;
        // 商品を削除
        $this->destroy($stock_id);
        // 商品のパスを返す
        return $stock_id;
    }
    // 商品の販売状態を変更
    public function changeStatus($stock_id) {
        $item = $this->find($stock_id);
        $status = $item->status;
        $status = !$status;
        $item->fill([
            'status' => $status
        ]);
        $item->save();
    }
    // DBのcategoryテーブルと紐づけ
    public function category() {
        return $this->belongsTo('\App\Models\Category');
    }
    // DBのPhotoテーブルと紐づけ
    public function photo() {
        return $this->hasMany('\App\Models\Photo');
    }
    // DBのdiscountテーブルと紐づけ
    public function discount() {
        return $this->belongsTo('\App\Models\Discount');
    }
    // DBのtagmapテーブルと紐づけ
    public function tagmap() {
        return $this->hasMany('\App\Models\Tagmap');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagmap extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $table = 'tagmaps';
    // DB　stockテーブルと紐づけ
    public function stock() {
        return $this->belongsTo('\App\Models\Stock');
    }
    // DB tagテーブルと紐づけ
    public function tag() {
        return $this->belongsTo('\App\Models\Tag');
    }
    // 複数登録
    public function createTags($tags, $stock_id) {
        if(isset($tags[0])) {
            foreach($tags as $tag) {
                $this->create([
                    'stock_id' => $stock_id,
                    'tag_id' => $tag,
                ]);
            }
        }
    }
    // 編集
    public function editTags($request) {
        $stock_id = $request->id;
        $tags = $request->tags;
        // 同じストックidのやつをすべて削除
        $this->where('stock_id', $stock_id)->delete();
        // 今回選択されたタグを追加
        if(isset($tags)) {
            $this->createTags($tags, $stock_id);
        }
    }
    // 複数削除
    public function deleteTags($stock_id) {
        $this->where('stock_id', $stock_id)->delete();
    }
}

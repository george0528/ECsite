<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $table = 'photos';
    public function addPhoto($stock_id,$imgs) {
        foreach($imgs as $img) {
            // 写真の名前取得
            $fileName = $img->getClientOriginalName();
            // 写真をpublicに保存
            $img->storeAs('image', $fileName, 'public');
            // DB操作
            $this->create([
                'stock_id' => $stock_id,
                'imgpath' => $fileName
            ]);
        }
    }
    public function deletePhoto($data) {
        // DBから削除
        $this->destroy($data->id);
        // ファイルを削除
        Storage::delete('/public/image/'.$data->imgpath);
    }
    public function deletePhotos($stock_id) {
        $photos = $this->where('stock_id', $stock_id)->get();
        foreach($photos as $data) {
            // オリジナル削除関数
            $this->deletePhoto($data);
        }
    }
}

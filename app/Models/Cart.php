<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    protected $fillable = [
        'stock_id', 'user_id','quantity'
    ];
    // カートの中身を取得
    public function showCart() {
        $user_id = Auth::id();
        $data['my_carts'] = $this->where('user_id',$user_id)->get();
        $data['count'] = 0;
        $data['sum'] = 0;
        foreach($data['my_carts'] as $my_cart) {
            $fee = $my_cart->stock->fee;
            $quantity = $my_cart->quantity;
            $data['count'] += $quantity;
            if($my_cart->stock->discount->id == 1) {
                $data['sum'] += $fee * $quantity;
            } else {
                $data['sum'] += $fee * $quantity * $my_cart->stock->discount->discount;
            }
        }
        return $data;
    }
    // カートに追加
    public function addCart($request) {
        $user_id = Auth::id();
        // stock_idとuser_idが一致していればquantityを更新する　なければ新しく作成する
        return $this->updateOrCreate(['stock_id' => $request->stock_id,'user_id' => $user_id],['quantity' => $request->quantity]); 
    }
    // カートから削除
    public function deleteItem($stock_id){
        $user_id = Auth::id();
        $delete = $this->where('user_id', $user_id)->where('stock_id', $stock_id)->delete();
        return $delete;
    }
    // カートの中身全てを削除
    public function deleteCart() {
        $user_id = Auth::id();
        $checkout_items = $this->where('user_id', $user_id)->get();
        $this->where('user_id', $user_id)->delete();
        return $checkout_items;
    }
    // カートの商品の数を変更
    public function changeCart($id, $quantity) {
        $user_id = Auth::id();
        $item = $this->where('user_id', $user_id)->where('stock_id', $id)->first();
        $item->fill([
            'quantity' => $quantity
        ]);
        $item->save();
        $data = $this->showCart();
        return $data;
    }
    // DBのStockテーブルと紐づけ
    public function stock() {
        return $this->belongsTo('\App\Models\Stock');
    }
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class Order extends Model
{
    protected $guarded = [
        'id'
    ];
    public function sort($sort) {
        switch($sort){
            case 0:
                return $this->where('status', 0)->get();
                break;
            case 1:
                return $this->where('status', 1)->get();
                break;
            default:
                return $this->all();
        }
    }
    public function createOrder($data) {
        return $this->create($data);
    }
    public function showOrder() {
        $id = Auth::id();
        $data = $this->where('user_id', $id)->get();
        return $data;
    }
    public function showOrderAll() {
        $data = $this->all();
        return $data;
    }
    // 状態を変更
    public function changeStatus($order_id) {
        $order = $this->find($order_id);
        $status = $order->status;
        $status = !$status;
        $order->fill([
            'status' => $status
        ]);
        $order->save();
    }
    // DBのstockテーブルと紐づけ
    public function stock() {
        return $this->belongsTo('App\Models\Stock');
    }
    // DBのuserテーブルと紐づけ
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    use HasFactory;
}

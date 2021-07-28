<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{
    public function checkout(Request $request, Cart $cart,Order $order,MailSendController $mail) {
    try{
        // StiripeのApikeyを設定する
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Customer::create([
            'email' => $request->stripeEmail,
            'source' => $request->stripeToken
        ]);
        // カートの情報取得
        $data = $cart->showCart();
        // 値段の整合性をチェックする
        if($request->sum != $data['sum']) {
            return redirect(route('mycart'))->with('message', '決済に失敗しました。カートの値段と決済の値段が違います   。');
        } 
        // 住所が登録されているかチェックする
        if(empty(Auth::user()->zipcode) || empty(Auth::user()->address)) {
            return redirect(route('mycart'))->with('message', '住所が登録されていないため決済に失敗しました。');
        }
        // 名前が登録されているかチェックする
        if(empty(Auth::user()->realname)) {
            return redirect(route('mycart'))->with('message', '名前が登録されていないため決済に失敗しました。');
        }
        // Stiripe決済処理
        $charge = Charge::create([
            'customer' => $customer->id,
            'amount' => $data['sum'],
            'currency' => 'jpy'
        ]);
        // 注文履歴を作る
        foreach($data['my_carts'] as $my_cart) {
            $mailData = $order->createOrder([
                'user_id' => $my_cart->user_id,
                'stock_id' => $my_cart->stock_id,
                'quantity' => $my_cart->quantity,
                'fee' => $my_cart->stock->fee * $my_cart->stock->discount->discount,
                'url' => $my_cart->stock->url,
            ]);
        }
        // カート内の商品を削除
        $info = $cart->deleteCart();
        } catch(Exception $e) {
            return redirect(route('mycart'))->with('message', 'エラーが発生しました。');
            return $e->getMessage();
        }
        $mail->adminCheckout($mailData);
        return redirect(route('checkoutafter'))->with('data', $data);
    }
}

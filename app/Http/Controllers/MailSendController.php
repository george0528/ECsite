<?php

namespace App\Http\Controllers;

use App\Mail\AdminCheckout;
use App\Mail\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSendController extends Controller
{
    // 登録メール
    public function register($data) {
        Mail::to($data['email'])->send(new Register($data));
    }
    // 運営宛て購入メール
    public function adminCheckout($data) {
        Mail::to(config('mail.from.address'))->send(new AdminCheckout($data));
    }
    // テスト
    public function test($data) {
        Mail::to($data['email'])->send(new Register($data));
    }
}

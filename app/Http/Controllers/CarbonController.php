<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CarbonController extends Controller
{
    public static function date() {
        // 現在時刻をとる
        $date = new Carbon('now');
        // 現在時刻に一週間減算する
        $date = $date->subDays(7);
        return $date;
    }
}

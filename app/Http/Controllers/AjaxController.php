<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category;

class AjaxController extends Controller
{
    public function cartApi(Request $request, Cart $cart) {
        $id = $request->itemId;
        $quantity = $request->itemQuantity;
        $data = $cart->changeCart($id, $quantity);
        $sum = $data['sum'];
        $count = $data['count'];
        return response()->json([
            'sum' => $sum,
            'count' => $count
            ]);
    }
    public function categoryCreate(Request $request, Category $category) {
        $name = $request->name;
        $info = $category->firstOrCreate(['name' => $name]);
        return  response()->json($info);
    }
}

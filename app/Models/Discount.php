<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $table = 'discounts';
    public function addDiscount($request) {
        $this->create([
            'name' => $request->name,
            'percent' => $request->percent,
            'discount' => $request->discount,
        ]);
    }
}

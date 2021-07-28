<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [
        'id'
    ];
    protected $table = 'categories';
    public function edit($request) {
        $table = $this->find($request->id);
        $name = $request->only('name');
        $result = $table->fill($name)->save();
        return $result;
    }
    use HasFactory;
}

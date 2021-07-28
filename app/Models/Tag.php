<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $table = 'tags';
    // DBのtagmapテーブルと紐づけ
    public function tagmap() {
        return $this->hasMany('\App\Models\Tagmap');
    }
}

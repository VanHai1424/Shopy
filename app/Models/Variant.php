<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'img',
        'product_id',
        'color_id',
        'size_id',
    ];

    public function color() {
        return $this->belongsTo(Color::class);
    }

    public function size() {
        return $this->belongsTo(Size::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}

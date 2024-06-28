<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'thumbnail',
        'price',
        'desc',
        'status',
        'category_id',
    ];

    public function variants() {
        return $this->hasMany(Variant::class);
    }
}

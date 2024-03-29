<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sellerProducts extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'brand',
        'category_id',
        'price',
        'discount',
        'quantity',
        'description',
        'image',
    ];
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}

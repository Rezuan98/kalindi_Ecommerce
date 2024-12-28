<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Galary_Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'image_path', 'is_primary', 'sort_order'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

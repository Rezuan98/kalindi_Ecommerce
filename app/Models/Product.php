<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVarient;
use App\Models\GalleryImage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name','slug','product_image', 'product_code', 'category_id', 
        'subcategory_id', 'brand_id', 'unit_id',
        'regular_price', 'sale_price', 'description', 'status'
    ];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }
}

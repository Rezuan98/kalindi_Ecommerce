<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVarient;
use App\Models\GalleryImage;

class ProductViewController extends Controller
{
    public function productDetails($id)
    {
        $product = Product::with(['category', 'galleryImages', 'variants.size', 'variants.color'])->find($id);
    
        // If needed, you can also include variants like this:
        $variants = ProductVarient::where('product_id', $product->id)->get();
    
        return view('frontend.pages.product_details', compact('product', 'variants'));
    }
    

    public function categoryProducts(){

        return view('frontend.pages.category_product_page');
    }
}

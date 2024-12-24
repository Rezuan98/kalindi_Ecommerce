<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductViewController extends Controller
{
    public function productDetails(){

        return view('frontend.pages.product_details');
    }

    public function categoryProducts(){

        return view('frontend.pages.category_product_page');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVarient;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\GalleryImage;

class indexController extends Controller
{
    public function index(){

        $new_arrival = Product::where('category_id',1)->with('variants','galleryImages')->get();

       
        return view('frontend.master.index',compact('new_arrival'));
    }
}

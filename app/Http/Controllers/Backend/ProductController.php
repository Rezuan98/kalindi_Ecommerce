<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Color;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Unit;

use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
     public function index(){
    	$lists = Product::latest()->get();
    	return view('back-end.product.index',compact('lists'));
    }

    public function create(){

    $categories = Category::all();
    $subcategory = Subcategory::all();
    $color = Color::all();
    $size = Size::all();
    $brand = Brand::all();
    $unit = Unit::all();

    	return view('back-end.product.create',compact('categories','subcategory','color','size','brand','unit'));
    }

  public function store(Request $request) {

    // Validate the request
    $request->validate([
        'product_name' => 'required|string|max:255',
     
    ]);

    $info = new Product();
    $info->product_name = $request->product_name;

  
    // if($request->hasFile('product_image')) {
    //     $images = $request->file('product_image');
    //     $imagePaths = [];
    //     $path = public_path('back-end/product/');

    //     foreach ($images as $image) {
    //         $fileName = time().'_'.$image->getClientOriginalName();
    //         $image->move($path, $fileName);
    //         $imagePaths[] = $fileName;
    //     }

    //     $info->product_image = implode(',', $imagePaths);
    // }

    $info->save();
    Toastr::success('Data Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
    
    return redirect()->route('product.index');
}



     public function edit($id){
     	$info = Product::findOrFail($id);
    	return view('back-end.product.edit',compact('info'));
    }

   public function update(Request $request){
    // Validate the request
    $request->validate([
        'product_name' => 'required|string|max:255',
    ]);

    $info = Product::findOrFail($request->id);
    $info->product_name = $request->product_name;

  
    // if($request->hasfile('product_image')){
       
    //     $oldImages = explode(',', $info->product_image);
    //     foreach ($oldImages as $oldImage) {
    //         $destination = public_path('back-end/product/').$oldImage;
    //         if(file_exists($destination)){
    //             @unlink($destination);
    //         }
    //     }

     
    //     $images = $request->file('product_image');
    //     $imagePaths = [];
    //     foreach ($images as $image) {
    //         $fileName = time().'_'.$image->getClientOriginalName();
    //         $image->move(public_path('back-end/product'), $fileName);
    //         $imagePaths[] = $fileName;
    //     }

    //     $info->product_image = implode(',', $imagePaths);
    // }

    $info->save();

    Toastr::success('Product Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);
    return redirect()->route('product.index');
}


    public function delete($id){
     	$info = Product::findOrFail($id);
     	//  if($info){
        //    @unlink(public_path('back-end/product/'.$info->product_image));
        //    $info->delete(); 
        // }
     	$info->delete();
    	return redirect()->route('product.index');
    }





    public function getSubcategories($categoryId)
{

 
    $subcategories = Subcategory::where('category_id', $categoryId)->get();
    return response()->json($subcategories);
}

}

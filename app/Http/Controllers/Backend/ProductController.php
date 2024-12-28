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
use Illuminate\Support\Str;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\ProductVarient;
use App\Models\GalleryImage;

class ProductController extends Controller
{
    public function index()
{
    $lists = Product::with(['category', 'subcategory', 'brand', 'unit'])
                    ->latest()
                    ->get();
    
    return view('back-end.product.index', compact('lists'));
}

public function ViewDetails($id){
    $variants = ProductVarient::where('product_id',$id)->with(['product', 'color', 'size'])
                            ->latest()
                            ->get();
    
    // return view('back-end');

    return view('back-end.product.product-details',compact('variants'));
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

 

    public function store(Request $request)
{
    // Move validation to a separate variable so we can use withErrors() if needed
    // $validator = Validator::make($request->all(), [
    //     'product_name' => 'required|max:255',
    //     'category_id' => 'required|exists:categories,id',
    //     'subcategory_id' => 'required|exists:subcategories,id',
    //     'brand_id' => 'nullable|exists:brands,id',
    //     'unit_id' => 'nullable|exists:units,id',
    //     'description' => 'nullable',
    //     'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     'colors' => 'required|array',
    //     'colors.*' => 'exists:colors,id',
    //     'sizes' => 'required|array',
    //     'sizes.*' => 'exists:sizes,id',
    //     'stock_quantity' => 'required|integer|min:0',
    //     'variant_price' => 'required|numeric|min:0',
    //     'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    // ]);

    // if ($validator->fails()) {
    //     return redirect()->route('product.create')
    //                     ->withErrors($validator)
    //                     ->withInput();
    // }

    // Handle Product Image Upload

    // dd($request);
    if ($request->hasFile('product_image')) {
        $file = $request->file('product_image');
        $productImage = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/products'), $productImage);
    }

    // Create Product Object
    $product = new Product();
    $product->product_name = $request->product_name;
    $product->slug = Str::slug($request->product_name);
    $product->product_image = $productImage;
    $product->product_code = 'P' . time() . rand(10000, 99999);
    $product->category_id = $request->category_id;
    $product->subcategory_id = $request->subcategory_id;
    $product->brand_id = $request->brand_id;
    $product->unit_id = $request->unit_id;
    $product->description = $request->description;
    $product->discount_type = $request->discount_type;
    $product->discount_amount = $request->discount;
    $product->sale_price = $request->price;
    $product->status = true;
    $product->save();





    // for product variant
    $colors = $request->colors;
    $sizes = $request->sizes;
    $stocks = $request->stock_quantity;
    $prices = $request->variant_price;

    foreach ($colors as $key => $colorId) {
        $variant = new ProductVarient();
        $variant->product_id = $product->id;
        $variant->color_id = $colorId;
        $variant->size_id = $sizes[$key];
        $variant->stock_quantity = $stocks[$key];
        $variant->variant_price = $prices[$key];
        $variant->sku = $product->product_code . '-' . $colorId . '-' . $sizes[$key];
        $variant->status = true;
        $variant->save();
    }

    // Handle Gallery Images
    if ($request->hasFile('gallery')) {
        foreach ($request->file('gallery') as $image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/gallery'), $imageName);

            $galleryImage = new GalleryImage();
            $galleryImage->product_id = $product->id;
            $galleryImage->image = $imageName;
            $galleryImage->save();
        }
    }

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

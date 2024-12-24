<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\Frontend\ProductViewController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\HomeController;
use Intervention\Image\ImageManager;

use Intervention\Image\Facades\Image;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[IndexController::class,'index'])->name('home');

Route::get('/product/details',[ProductViewController::class,'productDetails'])->name('product.details');

Route::get('/category/products',[ProductViewController::class,'categoryProducts'])->name('category.products');
Route::get('/cart/page',[CartController::class,'cartPage'])->name('cart.page');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// backend routes
Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

Route::group(['namespace'=>"App\Http\Controllers\Backend"],function(){

// category routes start here
Route::group(['prefix'=>"category",'as'=>'category.'],function(){

    Route::get('/manage','CategoryController@index')->name('index');
    Route::get('/create','CategoryController@create')->name('create');
    Route::post('/store','CategoryController@store')->name('store');
    Route::get('/edit/{id}','CategoryController@edit')->name('edit');
    Route::post('/update','CategoryController@update')->name('update');
    Route::get('/delete/{id}','CategoryController@delete')->name('delete');
    Route::post('/update-status','CategoryController@updateStatus')->name('updateStatus');
});
// category routes ends here



// subcategory routes starts here
Route::group(['prefix'=>"subcategory",'as'=>'subcategory.'],function(){

    Route::get('/manage','SubcategoryController@index')->name('index');
    Route::get('/create','SubcategoryController@create')->name('create');
    Route::post('/store','SubcategoryController@store')->name('store');
    Route::get('/edit/{id}','SubcategoryController@edit')->name('edit');
    Route::post('/update','SubcategoryController@update')->name('update');
    Route::get('/delete/{id}','SubcategoryController@delete')->name('delete');
    Route::post('/update-status','SubcategoryController@updateStatus')->name('updateStatus');
});

// subcategory routes ends here

// color routes starts here
Route::group(['prefix'=>"color",'as'=>'color.'],function(){

    Route::get('/manage','ColorController@index')->name('index');
    Route::get('/create','ColorController@create')->name('create');
    Route::post('/store','ColorController@store')->name('store');
    Route::get('/edit/{id}','ColorController@edit')->name('edit');
    Route::post('/update','ColorController@update')->name('update');
    Route::get('/delete/{id}','ColorController@delete')->name('delete');
    Route::post('/update-status','ColorController@updateStatus')->name('updateStatus');
});

// color routes ends here

// Size routes starts here
Route::group(['prefix'=>"size",'as'=>'size.'],function(){

    Route::get('/manage','SizeController@index')->name('index');
    Route::get('/create','SizeController@create')->name('create');
    Route::post('/store','SizeController@store')->name('store');
    Route::get('/edit/{id}','SizeController@edit')->name('edit');
    Route::post('/update','SizeController@update')->name('update');
    Route::get('/delete/{id}','SizeController@delete')->name('delete');
    Route::post('/update-status','SizeController@updateStatus')->name('updateStatus');
});

// Size routes ends here

// Brand routes starts here
Route::group(['prefix'=>"brand",'as'=>'brand.'],function(){

    Route::get('/manage','BrandController@index')->name('index');
    Route::get('/create','BrandController@create')->name('create');
    Route::post('/store','BrandController@store')->name('store');
    Route::get('/edit/{id}','BrandController@edit')->name('edit');
    Route::post('/update/{id}','BrandController@update')->name('update');
    Route::get('/delete/{id}','BrandController@delete')->name('delete');
    Route::post('/update-status','BrandController@updateStatus')->name('updateStatus');
});

// Brand routes ends here

// Unit routes starts here
Route::group(['prefix'=>"unit",'as'=>'unit.'],function(){

    Route::get('/manage','UnitController@index')->name('index');
    Route::get('/create','UnitController@create')->name('create');
    Route::post('/store','UnitController@store')->name('store');
    Route::get('/edit/{id}','UnitController@edit')->name('edit');
    Route::post('/update','UnitController@update')->name('update');
    Route::get('/delete/{id}','UnitController@delete')->name('delete');
    Route::post('/update-status','UnitController@updateStatus')->name('updateStatus');
});

// Units routes ends here

});























Route::group(['prefix'=>"profile",'as'=>'profile.','namespace'=>"App\Http\Controllers"],function(){

    Route::get('/change/password','ProfileController@change_password')->name('change.password');
    Route::post('/change/password/updated','ProfileController@password_updated')->name('change.password.updated');

});



/* product */
// Route::group(['prefix'=>"product",'as'=>'product.','namespace'=>"App\Http\Controllers"],function(){
//     Route::get('/list','ProductController@index')->name('index');
//     Route::get('/create','ProductController@create')->name('create');
//     Route::post('/store','ProductController@store')->name('store');
//     Route::get('/edit/{id}','ProductController@edit')->name('edit');
//     Route::post('/update','ProductController@update')->name('update');
//     Route::get('/delete/{id}','ProductController@delete')->name('delete');
// });
/* product */








/* setting */
Route::group(['prefix'=>"setting",'as'=>'setting.','namespace'=>"App\Http\Controllers"],function(){
    Route::get('/create','SettingController@create')->name('create');
    Route::post('/store','SettingController@store')->name('store');
    Route::get('/{id}/edit','SettingController@edit')->name('edit');
    Route::patch('/{id}/update','SettingController@update')->name('update');
});
/* setting */

/* additional work */
Route::group(['prefix'=>"get",'as'=>'get.','namespace'=>"App\Http\Controllers"],function(){
    Route::get('/products','AdditionalController@getProducts')->name('products');
    Route::get('/customers','AdditionalController@getCustomers')->name('customers');
    Route::get('/invoices','AdditionalController@getInvoices')->name('invoices');
    Route::get('/customer/group','AdditionalController@getCustomerGroup')->name('customer.group');
});




Route::get('/test-image', function () {
    $manager = new ImageManager();
    $image = $manager->make(public_path('exampl.jpg'))->resize(300, 200);
    return $image->response('jpg');
});

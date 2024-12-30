<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\Frontend\ProductViewController;
use App\Http\Controllers\Frontend\CartController;

use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\SettingController;

// Start unauthenticated Frontend routes

Route::get('/',[IndexController::class,'index'])->name('home');

Route::get('/product/details',[ProductViewController::class,'productDetails'])->name('product.details');

Route::get('/category/products',[ProductViewController::class,'categoryProducts'])->name('category.products');
Route::get('/cart/page',[CartController::class,'cartPage'])->name('cart.page');

// routes for user profile related
Route::get('/user/register', [UserLoginController::class, 'userRegister'])->name('user.register');
Route::get('/user/login', [UserLoginController::class, 'userLogin'])->name('user.login');













Route::middleware('auth')->group(function () {

    // Start Frontend Authorized routes for logged in User 

    Route::post('/new/password/update', [UserController::class, 'UpdateUserPassword'])->name('new.password.update')->middleware('auth');;
    Route::get('/user/dashboard', [UserController::class, 'userProfile'])->name('user.dashboard')->middleware('auth'); // Profile dashboard
    Route::post('/user/user/profile/update', [UserController::class, 'UpdateUserProfile'])->name('user.profile.update');
    

    Route::get('/user/orders', [UserController::class, 'orders'])->name('user.orders'); // View all orders
    Route::get('/user/orders/{order}', [UserController::class, 'showOrder'])->name('user.orders.show'); // View specific order

    // **Wishlist**
    Route::get('/user/wishlist', [UserController::class, 'wishlist'])->name('user.wishlist'); // View wishlist
    Route::post('/user/wishlist/add/{product}', [UserController::class, 'addToWishlist'])->name('user.wishlist.add'); // Add product to wishlist
    Route::delete('/users/wishlist/remove/{product}', [UserController::class, 'removeFromWishlist'])->name('users.wishlist.remove'); // Remove product from wishlist

    // **Profile Management**
    Route::get('/user/edit', [UserController::class, 'editProfile'])->name('user.edit'); // Edit profile
    Route::put('/user/update', [UserController::class, 'updateProfile'])->name('user.update'); // Update profile details
    Route::put('/user/password/update', [UserController::class, 'updatePassword'])->name('user.password.update'); // Update password

    // **Address Management**
    Route::get('/user/addresses', [UserController::class, 'addresses'])->name('user.addresses'); // View all addresses
    Route::post('/user/addresses/store', [UserController::class, 'storeAddress'])->name('user.addresses.store'); // Add a new address
    Route::put('/user/addresses/{address}/update', [UserController::class, 'updateAddress'])->name('user.addresses.update'); // Update an address
    Route::delete('/user/addresses/{address}/delete', [UserController::class, 'deleteAddress'])->name('user.addresses.delete'); // Delete an address
   
// Frontend Authorized routes for loggedin User end









// start Backend routes Authenticated





Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
Route::get('/all/users', [HomeController::class, 'allUsers'])->name('all.users');
Route::post('/user/change-role', [HomeController::class, 'changeUserRole'])
    ->name('user.change.role')
    ->middleware('auth');

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



/* product */
Route::group(['prefix'=>"product",'as'=>'product.'],function(){
    Route::get('/list','ProductController@index')->name('index');
    Route::get('/create','ProductController@create')->name('create');
    Route::get('/get-subcategories/{categoryId}','ProductController@getSubcategories')->name('get.subcategories');
    Route::get('/view/details/{id}','ProductController@ViewDetails')->name('view.details');
    Route::post('/product/update-status/','ProductController@updateStatus')->name('updateStatus');
    Route::post('/product/varient/update-status/','ProductController@updateVarientStatus')->name('varient.updateStatus');
    Route::post('/store','ProductController@store')->name('store');
    Route::get('/edit/{id}','ProductController@edit')->name('edit');
    Route::post('/update/{id}','ProductController@update')->name('update');
    Route::get('/delete/{id}','ProductController@delete')->name('delete');
    Route::delete('/delete/gallery-image/{id}','ProductController@deleteGalleryImage')->name('delete.gallery-image');

    Route::post('/duplicate/{id}', 'ProductController@duplicateProduct')->name('duplicate');
});
/* product */





    });
    // End Backend routes Authenticated
    });
    

require __DIR__.'/auth.php';






// backend routes


Route::group(['namespace'=>"App\Http\Controllers\Backend"],function(){



























});













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





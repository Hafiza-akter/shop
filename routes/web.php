<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Website route start
Route::get('/','HomeController@index')->name('homepage');
Route::get('/shop','FrontController@shop')->name('shop');
Route::get('/shopnongrid','FrontController@shopNonGrid')->name('shop.nongrid');
Route::get('/pdetails','FrontController@index')->name('productdetails');

// admin panel route start
Route::group(['middleware'=>'checkLogout'],function(){
    Route::get('/admin','LoginController@index')->name('base');
    Route::post('/login','LoginController@login')->name('login');
});


Route::group(['middleware'=>'checkLogin'],function(){

    Route::get('/logout','LoginController@logout')->name('logout');
    Route::get('/dashboard','LoginController@dashboard')->name('dashboard');

    Route::group(['middleware'=>'checkSuperAdmin'],function(){
        Route::prefix('user')->group(function(){
            Route::get('/', 'UserController@index')->name('userlist');
            Route::get('/create','UserController@create')->name('useradd');
            Route::post('/store','UserController@store')->name('userstore');
            Route::get('/delete/{id}','UserController@delete')->name('userdelete');
            Route::get('/edit/{id}','UserController@edit')->name('useredit');
            Route::post('/update','UserController@update')->name('userupdate');
        });
        Route::prefix('setting')->group(function(){
            Route::get('/', 'SettingController@index')->name('settinglist');
            Route::get('/edit/{id}','SettingController@edit')->name('settingedit');
            Route::post('/update','SettingController@update')->name('settingupdate');
        });
        Route::prefix('homepage')->group(function(){
            Route::get('/', 'HomepageController@index')->name('homepagelist');
            Route::get('/edit/{id}','HomepageController@edit')->name('homepageedit');
            Route::post('/update','HomepageController@update')->name('homepageupdate');
        });
    });

    Route::prefix('category')->group(function(){
            Route::get('/','CategoryController@index')->name('categoryList');
            Route::get('/create','CategoryController@create')->name('categoryCreate');
            Route::Post('/store','CategoryController@store')->name('categoryStore');
            Route::get('/edit/{id}','CategoryController@edit')->name('categoryEdit');
            Route::post('/update','CategoryController@update')->name('categoryUpdate');
            Route::get('/delete/{id}','CategoryController@delete')->name('categoryDelete');

    });

    Route::prefix('subcategory')->group(function(){
        Route::get('/','SubCategoryController@index')->name('subCategoryList');
        Route::get('/create','SubCategoryController@create')->name('subCategoryCreate');
        Route::Post('/store','SubCategoryController@store')->name('subCategoryStore');
        Route::get('/edit/{id}','SubCategoryController@edit')->name('subCategoryEdit');
        Route::post('/update','SubCategoryController@update')->name('subCategoryUpdate');
        Route::get('/delete/{id}','SubCategoryController@delete')->name('subCategoryDelete');

});

    Route::prefix('product')->group(function(){
            Route::get('/','ProductController@index')->name('productList');
            Route::get('/create','ProductController@create')->name('productCreate');
            Route::post('/store','ProductController@store')->name('productStore');
            Route::get('/show/{id}','ProductController@show')->name('productShow');
            Route::get('/edit/{id}','ProductController@edit')->name('productEdit');
            Route::post('/update','ProductController@update')->name('productUpdate');
            Route::get('/view/{id}','SupplierController@destroy')->name('productView');
            Route::get('/delete/{id}','ProductController@destroy')->name('productDelete');
    });

    Route::prefix('supplier')->group(function(){
        Route::get('/','SupplierController@index')->name('supplierList');
        Route::get('/create','SupplierController@create')->name('supplierCreate');
        Route::post('/store','SupplierController@store')->name('supplierStore');
        Route::get('/show/{id}','SupplierController@show')->name('supplierShow');
        Route::get('/edit/{id}','SupplierController@edit')->name('supplierEdit');
        Route::post('/update','SupplierController@update')->name('supplierUpdate');
        Route::get('/delete/{id}','SupplierController@destroy')->name('supplierDelete');
    });

    Route::prefix('coupon')->group(function(){
        Route::get('/','CouponController@index')->name('couponList');
        Route::get('/create','CouponController@create')->name('couponCreate');
        Route::post('/store','CouponController@store')->name('couponStore');
        Route::get('/show/{id}','CouponController@show')->name('couponShow');
        Route::get('/edit/{id}','CouponController@edit')->name('couponEdit');
        Route::post('/update','CouponController@update')->name('couponUpdate');
        Route::get('/delete/{id}','CouponController@destroy')->name('couponDelete');
    });

    Route::prefix('order')->group(function(){
        Route::get('/','OrderController@index')->name('orderList');
        Route::get('/recent','OrderController@recent')->name('recentOrderList');
        // Route::get('/create','OrderController@create')->name('orderCreate');
        // Route::post('/store','OrderController@store')->name('orderStore');
        Route::get('/show/{id}','OrderController@show')->name('orderShow');
        Route::get('/edit/{id}','OrderController@edit')->name('orderEdit');
        Route::post('/update','OrderController@update')->name('orderUpdate');
        // Route::get('/delete/{id}','orderController@destroy')->name('orderDelete');
    });

    Route::prefix('orderItem')->group(function(){
        // Route::get('/','OrderItemController@index')->name('orderItemList');
        // Route::get('/create','OrderItemController@create')->name('orderItemCreate');
        // Route::post('/store','OrderItemController@store')->name('orderItemStore');
        Route::get('/show/{id}','OrderItemController@show')->name('orderItemShow');
        Route::get('/edit/{id}','OrderItemController@edit')->name('orderItemEdit');
        Route::post('/update','OrderItemController@update')->name('orderItemUpdate');
        // Route::get('/delete/{id}','OrderItemController@destroy')->name('orderItemDelete');
    });

    Route::prefix('banner')->group(function(){
        Route::get('/','BannerController@index')->name('bannerList');
        Route::get('/create','BannerController@create')->name('bannerCreate');
        Route::Post('/store','BannerController@store')->name('bannerStore');
        Route::get('/edit/{id}','BannerController@edit')->name('bannerEdit');
        Route::post('/update','BannerController@update')->name('bannerUpdate');
        Route::get('/delete/{id}','BannerController@delete')->name('bannerDelete');

});


});



// API test
Route::get('/categories','TestController@index')->name('catlist');
Route::get('/catimages/{id}','TestController@catimg')->name('imagesbycat');
Route::get('/createprofile','TestController@createprofile')->name('createprofile');
Route::post('/storeprofile','TestController@storeprofile')->name('storeprofile');



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


// 文章分类

Route::get('admin/login','admin\LoginController@index')->name('admin_login');
Route::post('admin/login','admin\LoginController@login');
Route::middleware(['adminLogin'])->group(function(){
    Route::get('/admin','admin\IndexController@index')->name('admin');
    Route::get('/admin/home','admin\IndexController@home')->name('admin.home');
    Route::middleware(['roles'])->group(function()
    {
        Route::resource('admin/brand','admin\BrandController');
        Route::resource('admin/goods','admin\GoodsController');
        Route::resource('admin/sku','admin\SkuController');
        Route::resource('admin/article','admin\ArticleController');
        Route::resource('admin/artcat','admin\ArtCatController');
       
        Route::resource('admin/advert','admin\AdvertController');
        Route::resource('admin/advertCat','admin\AdvertCatController');
        Route::resource('admin/permissions','admin\PermissionsController');
        Route::resource('admin/roles','admin\RolesController');
        Route::resource('admin/admin','admin\AdminController')->middleware('roles');
        Route::get('/admin/category', 'admin\CategoryController@index')->name('category');
        Route::get('/admin/category/create', 'admin\CategoryController@create')->name('addCate');
        Route::post('/admin/category/insert', 'admin\CategoryController@insert')->name('addCategory');
        Route::get('/admin/category/edit/{id}', 'admin\CategoryController@edit')->name('editCate');
        Route::post('/admin/category/update', 'admin\CategoryController@update')->name('doEditCate');
        Route::get('/admin/category/delete/{id}', 'admin\CategoryController@delete')->name('delCategory');

        Route::get('/admin/attribute', 'admin\AttributeController@index')->name('attri');
        Route::get('/admin/attribute/create', 'admin\AttributeController@create')->name('addAttr');
        Route::post('/admin/attribute/insert', 'admin\AttributeController@insert')->name('doAddAttr');
        Route::get('/admin/attribute/edit/{id}', 'admin\AttributeController@edit')->name('editAttr');
        Route::post('/admin/attribute/update', 'admin\AttributeController@update')->name('doEditAttr');
        Route::delete('/admin/attribute/{id}', 'admin\AttributeController@destroy');

    });

    Route::get('/ajaxGetCat/{id}','admin\GoodsController@getCat')->name('getCat');
    

    
});
// 前台
Route::get('/','home\IndexController@index')->name('index');
Route::get('/login','home\LoginController@index')->name('login');
Route::post('/login','home\LoginController@login')->name('doLogin');

Route::get('/category','home\IndexController@category');
Route::get('/item','home\ItemController@index')->name('item');
Route::get('/ajaxItem','home\ItemController@ajaxItem')->name('ajaxItem');

Route::get('/register','home\RegistController@regist')->name('register');
Route::post('/register','home\RegistController@doRegist')->name('doRegister');

Route::get('/mobileCode','home\RegistController@sendCode')->name('ajax-sendCode');

// 个人中心
// Route::get('/user/{id}','home\UserController@index')->name('user.index');

// 首页搜索
Route::get('/search','home\IndexController@search')->name('search');
// 购物车
// Route::get('/cart','home\CartController@index')->name('cart');
Route::get('/carts','home\CartController@carts')->name('carts');
// Route::post('/cart/store','home\CartController@store')->name('cart.store');

Route::middleware(['home'])->group(function() {
    Route::resource('/cart','home\CartController');
    // Route::get('/cart','home\CartController@index').name('cart.index');
    // Route::post('/cart','home\CartController@store').name('cart.index');
    // Route::get('/cart/delete/{id}','home\CartController@index').name('cart.delete');

    Route::get('/user','home\UserController@index')->name('user.index');
    // 用户的个人信息
    Route::get('/user/info','home\UserController@information')->name('user.info');
    Route::get('/user/address','home\UserController@address')->name('user.address');
    Route::post('/user/address','home\UserController@address_store')->name('address.store');
    Route::get('/user/address/{id}','home\UserController@default')->name('address.default');

    // 订单
    Route::get('/order','home\OrderController@create')->name("order.create");
    Route::get('/order/address','home\OrderController@address')->name("order.address");
    Route::get('/order/carts','home\OrderController@carts')->name("order.carts");
    Route::post('/order/store','home\OrderController@store')->name("order.store");
    Route::get('/order/destroy/{id}','home\OrderController@destroy')->name('order.destroy');
    // Route::get('/order/show/{id}','home\OrderController@show')->name('order.show');
    // Route::resource('/order','home\OrderController');
    // Route::resource('/order','home\OrderController');

    // 订单详情
    Route::get('/user/orderDetail/{id}','home\UserController@orderDetail')->name('orderDetail');
    // alipay
  
    Route::get('/wechat','home\AlipayController@pay')->name('wechat');

});

Route::get('/alipay','home\AlipayController@pay')->name('alipay');    
Route::get('/alipay/return','home\AlipayController@return');    
Route::post('/alipay/notify','home\AlipayController@notify');    

Route::get('/wxpay','home\WxpayController@pay')->name('wxpay');    

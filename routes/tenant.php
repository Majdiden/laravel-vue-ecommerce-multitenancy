<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    PreventAccessFromCentralDomains::class,
    InitializeTenancyByDomain::class,
])->group(function () {
    Route::get('/', 'StoreView@index');
    Route::get('dashboard/{any}', 'StoreView@index')->where('any', '.*');
    Route::get('dashboard/welcome', 'StoreView@loadStoreData')->name('welcome');
    Route::get('products/{any}', 'StoreView@index')->where('any', '.*');
    Route::get('product/{any}', 'StoreView@index')->where('any', '.*');
    Route::get('cart', 'StoreView@index');
    Route::get('checkout', 'StoreView@index');
});
Route::middleware([
    'web',
    PreventAccessFromCentralDomains::class,
    InitializeTenancyByDomain::class,
])->group(function () {
    Route::get('/dashboard/{any}', 'StoreView@index')->where('any', '.*');
    Route::get('/dashboard/welcome', 'StoreView@loadStoreData')->name('welcome');
    Route::get('/login', 'StoreView@index');

});

 Route::prefix('api')->middleware([
  'api',
  InitializeTenancyByDomain::class,
  PreventAccessFromCentralDomains::class
])->group(function(){

  Route::post('/login', 'LoginController@login')->name('login');
});

Route::prefix('api')->middleware([
    'auth:sanctum',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {


  Route::post('/logout', 'LoginController@logout')->name('logout');

    Route::get('/load', 'StoreView@loadStoreData');
    // Categories CRUD Routes
      Route::resource('categories', 'CategoryController');

    // Categories Product Count
    Route::get('categories/count', 'CategoryController@getCount');

    // Attributes CRUD Routes
      Route::resource('attributes', 'AttributeController');

    // Show All Attributes Route
      Route::get('attributes/load', 'ProductAttributeController@loadAttributes');

    // Show Product Attributes Route
      Route::post('attributes/show', 'ProductAttributeController@productAttributes');

    // Show Attribute Values Route
      Route::post('attributes/values', 'ProductAttributeController@loadValues');

    // Add Attribute to Product Route
      Route::post('attributes/add', 'ProductAttributeController@addAttribute');

    // Delete Attribute from Product Route
      Route::post('attributes/delete', 'ProductAttributeController@deleteAttribute');

    // Add to cart Route
      Route::post('cart/add', [
        'uses' =>  'ShoppingController@store',
        'as' => 'cart.add'
      ]);

    // Product CRUD Routes
      Route::resource('products', 'ProductController');

      // Product Image Upload Routes
      Route::post('upload', 'ProductImageController@upload');

    // Cart data Route
      Route::get('cart', 'ShoppingController@showItems');

      //Orders Management Routes
      Route::resource('orders', 'OrderController');

      // Place Order Routes
      Route::post('checkout', 'CheckoutController@placeoOrder');
});

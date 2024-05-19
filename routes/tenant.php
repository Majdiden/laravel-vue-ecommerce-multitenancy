<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Menu\MenuController;
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
    Route::get('dashboard/{any}', 'StoreView@index')->where('any', '.*');
    Route::get('dashboard/welcome', 'StoreView@loadStoreData')->name('welcome');
    Route::get('products/{any}', 'StoreView@index')->where('any', '.*');
    Route::get('product/{any}', 'StoreView@index')->where('any', '.*');
    //Get Cart Count Route
    Route::get('/cart/count', 'ShoppingController@getCartCount');

    // Place Order Routes
    Route::post('checkout', 'CheckoutController@placeoOrder');
    // Add to cart Route
    Route::post('cart/add', [
      'uses' =>  'ShoppingController@store',
      'as' => 'cart.add'
    ]);

      // Cart Data Route
      Route::get('cart', 'ShoppingController@showItems');



    Route::any('{any}', 'StoreView@index')->where('any', '^(?!api).*$');
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
  // Categories CRUD Routes
  Route::resource('categories', 'CategoryController');

  // Send Login Info
  Route::post('/login', 'LoginController@login')->name('login');

  // Get Store Name
  Route::get('/load', 'StoreView@loadStoreData');

  // Load Products
  Route::get('/load-products', 'ProductController@index');

  Route::get('/load-category-products/{id}', 'ProductController@showbycategory');

  // Get Hero Image
  Route::get('herocustomizer', 'StoreCustomizer@getHero');


  //Menu
  Route::post('set-menu', [MenuController::class, 'setMenu']);
  Route::get('get-menu', [MenuController::class, 'getMenu']);

});

Route::prefix('api')->middleware([
    'auth:sanctum',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

  //Store Total Revenue
    Route::get('total', 'StoreReport@revenue');

    //Store Total Sales
    Route::get('sales', 'StoreReport@sales');

    //Store Total Orders
      Route::get('total-orders', 'StoreReport@orders');

  Route::post('/logout', 'LoginController@logout')->name('logout');


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



    // Product CRUD Routes
      Route::resource('products', 'ProductController');

      // Product Image Upload Routes
      Route::post('upload', 'ProductImageController@upload');


      //Orders Management Routes
      Route::resource('orders', 'OrderController');
      Route::get('orders/list', 'OrderController@list');

      Route::post('customizer', 'StoreCustomizer@appendHero');

});

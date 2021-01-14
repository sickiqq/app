<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->middleware('guest')->name('login');
Route::post('login', 'Auth\LoginController@login')->middleware('guest');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::prefix('password')->name('password.')->group(function () {
        Route::get('/', 'UserController@showPasswordForm')->name('show_form');
        Route::put('/', 'UserController@updatePassword')->name('update');
        Route::get('/{user}/restore', 'UserController@passwordRestore')->name('restore');
        Route::put('/{user}', 'UserController@passwordStore')->name('store');
    });
    Route::get('/', 'UserController@index')->name('index')->middleware('can:administrador');
    Route::get('/create', 'UserController@create')->name('create')->middleware('can:administrador');
    Route::post('/', 'UserController@store')->name('store')->middleware('can:administrador');
    Route::get('/{user}/edit', 'UserController@edit')->name('edit')->middleware('can:administrador');
    Route::put('/{user}', 'UserController@update')->name('update')->middleware('can:administrador');
    Route::delete('/{user}', 'UserController@destroy')->name('destroy')->middleware('can:administrador');
});

Route::prefix('parameters')->as('parameters.')->middleware('auth')->group(function(){
    Route::get('/', 'Parameters\ParameterController@index')->name('index');
    Route::resource('permissions','Parameters\PermissionController');
});

Route::resource('categories','parameters\CategoryController')->middleware('auth');
Route::resource('subcategories','parameters\SubcategoryController')->middleware('auth');
Route::resource('products','parameters\ProductController')->middleware('auth');
Route::resource('promotions','parameters\PromotionController')->middleware('auth');
Route::resource('promotionItems','parameters\PromotionItemController')->middleware('auth');
Route::resource('waiters','parameters\WaiterController')->middleware('auth');
Route::resource('companies','parameters\CompanyController')->middleware('auth');
Route::resource('branchoffices','parameters\BranchOfficeController')->middleware('auth');
Route::resource('tables','parameters\TableController')->middleware('auth');

Route::get('scan/read_qr/{table_id}','client\ScanController@read_qr')->name('scan.read_qr');
Route::resource('scan','client\ScanController');
Route::resource('register','client\RegisterController');
// Route::post('cart/add_client_name', function(Request $request){Session::put( 'user_name', "aaa");})->name('cart.add_client_name');
// Route::post('cart/add_client_name', function(){session()->put('user_name', Input::get('user_name'));});
Route::match(['get', 'post'],'cart/add_client_name','client\CartController@add_client_name')->name('cart.add_client_name');
Route::get('cart/{product}/add_product_to_cart','client\CartController@add_product_to_cart')->name('cart.add_product_to_cart');
Route::get('cart/{promotion}/add_promotion_to_cart','client\CartController@add_promotion_to_cart')->name('cart.add_promotion_to_cart');
Route::get('cart/{product}/remove_product_from_cart','client\CartController@remove_product_from_cart')->name('cart.remove_product_from_cart');
Route::get('cart/{promotion}/remove_promotion_from_cart','client\CartController@remove_promotion_from_cart')->name('cart.remove_promotion_from_cart');
Route::get('cart/checkout','client\CartController@checkout')->name('cart.checkout');
Route::resource('cart','client\CartController');

Route::get('/home', 'HomeController@index')->name('home');

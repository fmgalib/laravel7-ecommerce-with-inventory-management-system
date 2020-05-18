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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('dashboard');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');


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

// Brand Backend Route
Route::group(['prefix' => '/brands'], function(){
	// Show manage page
	Route::get('/manage', 'Backend\BrandController@index')->name('manageBrand');
	// Show create page and store after submit
	Route::get('/create', 'Backend\BrandController@create')->name('createBrand'); 
	Route::post('/create', 'Backend\BrandController@store')->name('storeBrand');
	// Show edit page and update after submit
	Route::get('/edit/{id}', 'Backend\BrandController@edit')->name('editBrand');
	Route::post('/edit/{id}', 'Backend\BrandController@update')->name('updateBrand');
	// Delete brand
	Route::post('/delete/{id}', 'Backend\BrandController@destroy')->name('deleteBrand');

});

// Category Backend Route
Route::group(['prefix' => '/categories'], function(){
	// Show manage page
	Route::get('/manage', 'Backend\CategoryController@index')->name('manageCategory');
	// Show create page and store after submit
	Route::get('/create', 'Backend\CategoryController@create')->name('createCategory');
	Route::post('/create', 'Backend\CategoryController@store')->name('storeCategory');
	// Show edit page and update after submit
	Route::get('/edit/{id}', 'Backend\CategoryController@edit')->name('editCategory');
	Route::post('/edit/{id}', 'Backend\CategoryController@update')->name('updateCategory');
	// Delete category
	Route::post('/delete/{id}', 'Backend\CategoryController@destroy')->name('deleteCategory');

});


// Product Backend Route
Route::group(['prefix' => '/products'], function(){
	// Show manage page
	Route::get('/manage', 'Backend\ProductController@index')->name('manageProduct');
	// Show create page and store after submit
	Route::get('/create', 'Backend\ProductController@create')->name('createProduct'); 
	Route::post('/create', 'Backend\ProductController@store')->name('storeProduct');
	// Show edit page and update after submit
	Route::get('/edit/{id}', 'Backend\ProductController@edit')->name('editProduct');
	Route::post('/edit/{id}', 'Backend\ProductController@update')->name('updateProduct');
	// Delete product
	Route::post('/delete/{id}', 'Backend\ProductController@destroy')->name('deleteProduct');

});
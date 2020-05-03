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
// Manage Category Route

Route::group(['prefix' => '/categories'], function(){

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

Route::group(['prefix' => '/brands'], function(){

	Route::get('/manage', 'Backend\BrandController@index')->name('manageBrand');	

});
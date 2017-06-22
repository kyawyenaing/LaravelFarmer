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


// // Route::get('/category','CategoryController@index');
// Route::get('/category',function() {
// 	return view('admin/category/lists');
// });

Route::group(['middleware'=>['web']], function() {
	Auth::routes();
	Route::get('/', function () {
	    return view('welcome');
	});
	Route::get('/home', 'HomeController@index');
});
Route::group(['middleware'=>['admin']], function() {
	Route::resource('adminpanel','AdminController');
	Route::resource('admin/category','CategoryController');
	Route::resource('admin/company','CompanyController');
	Route::resource('admin/subcategory','SubCategoryController');
	// Route::resource();
});

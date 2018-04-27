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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function(){
	Route::get('login', 'UserLoginController@getUserLogin');
	Route::post('login', ['as'=>'user.auth', 'uses'=>'UserLoginController@userAuth']);
	Route::get('admin/login', 'AdminLoginController@getAdminLogin');
	Route::post('admin/login', ['as'=>'admin.auth', 'uses'=>'AdminLoginController@adminAuth']);
	Route::post('admin/logout', ['as'=>'admin.logout', 'uses' => 'AdminLoginController@logout']);

	Route::group(['middleware' => ['admin:admin']], function(){
		Route::get('admin/dashboard', ['as' => 'admin.dashboard', 'uses' => 'AdminController@dashboard']);

		Route::get('admin/banners', ['as' => 'admin.banners', 'uses' => 'BannerController@index']);
		Route::get('admin/banner/create', ['as' => 'admin.banner.create', 'uses' => 'AdminController@getBannerCreate']);
		Route::get('admin/banner/{slug}', ['uses' => 'BannerController@show']);
		Route::get('admin/banner/{slug}/edit', ['uses' => 'BannerController@edit']);
		Route::post('admin/banner/{slug}/edit', ['uses' => 'BannerController@update']);
		Route::post('admin/banner/store', ['as' => 'admin.banner.store', 'uses' => 'BannerController@store']);
		
	});
});


/*Error Handling routes*/
Route::get('404', ['as' => '404', 'uses' => 'ErrorHandlerController@errorCode404']);
Route::get('405', ['as' => '405', 'uses' => 'ErrorHandlerController@errorCode405']);
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
	return view('Login');
});

Route::get('Login', 'UserController@getLoginAdmin');
Route::post('Login', 'UserController@postLoginAdmin');
Route::get('Logout', 'UserController@getLogoutAdmin');


Route::group(['prefix'=>'admin','middleware'=>'AdminLogin'],function(){
	Route::group(['prefix'=>'group','middleware'=>'UserManagement'],function(){
		Route::get('listGroup','GroupUserController@getList');

		Route::get('addGroup','GroupUserController@getAdd');
		Route::post('addGroup','GroupUserController@postAdd');

		Route::get('editGroup/{id}','GroupUserController@getEdit');
		Route::post('editGroup/{id}','GroupUserController@postEdit');

		Route::get('deleteGroup/{id}','GroupUserController@getDelete');
	});	
	Route::group(['prefix'=>'user','middleware'=>'UserManagement'],function(){
		Route::get('listUser','UserController@getList');

		Route::get('addUser','UserController@getAdd');
		Route::post('add','UserController@postAdd');

		Route::get('editUser/{id}','UserController@getEdit');
		Route::post('editUser/{id}','UserController@postEdit');
	});

	Route::get('order/addOrder','OrderController@getAdd');
	Route::post('order/addOrder','OrderController@postAdd');

	Route::get('order/editOrder/{id}','OrderController@getEdit');
	Route::post('order/editOrder','OrderController@postEdit');

	Route::get('order/listOrder','OrderController@getList');
	Route::get('order/detailOrder/{id}','OrderController@getDetail');

	Route::get('ajax/getChiPhiSuaChua/{id}','AjaxController@getChiPhiSuaChua');
});
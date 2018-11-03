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
//商家账号表
Route::resource('user','ShopControllers\UserController');
//商家分类表
Route::resource('shopCategorie','ShopControllers\ShopCategorieController');
//商家信息表
Route::resource('shop','ShopControllers\ShopController');
//菜品分类
Route::resource('food_classification','ShopControllers\FoodClassificationController');
//活动
//Route::resource('activity','ShopControllers\ActivityController');
Route::get('activity','ShopControllers\ActivityController@index')->name('activity');
Route::get('activity.show/{data}','ShopControllers\ActivityController@show')->name('activity.show');

//菜品
Route::resource('food','ShopControllers\FoodController');
//搜索
//Route::post('search','ShopControllers\FoodController@search')->name('search');
Route::get('search','ShopControllers\FoodController@search')->name('search');
//商家登录
Route::get('login','ShopControllers\LoginController@index')->name('login');
Route::get('login.destroy','ShopControllers\LoginController@destroy')->name('login.destroy');
Route::post('login.route','ShopControllers\LoginController@route')->name('route');

//订单
Route::get('order','ShopControllers\OrderController@index')->name('order.show');

//统计
Route::get('day','ShopControllers\OrderStatisticsController@day');

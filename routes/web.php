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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mypage', 'Auth\LoginController@mypage_test');

//プロフィール編集処理
Route::get('/profileEdit', 'ProfileController@profileEditShow')->name('profileEdit');
Route::post('/profileImageChange', 'ProfileController@profileImageChange');
Route::post('/profileEdit', 'ProfileController@profileEdit');
Route::post('/passwordChange', 'ProfileController@passwordChange');

//投稿処理
Route::get('/post', 'PostController@postShow')->name('post');
Route::post('/post', 'PostController@post');
Route::get('/postDetail', 'Auth\LoginController@postDetail');

//ユーザー詳細
Route::get('/userDetail/{user_id}', 'UserController@userDetail')->name('userDetail');

Route::post('/follow', 'UserController@follow');



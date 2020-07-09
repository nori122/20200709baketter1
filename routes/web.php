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

Route::get('/', 'TweetsController@index');

Route::resource('tweets','TweetsController')->only([
    'index','store','edit','update','destroy'
    ]);

Auth::routes();

Route::get('/home', 'TweetsController@index')->name('home');

// ==========ここから追加する==========
//ユーザ編集画面（「プロフィールを編集する」をクリックしたら開く）
Route::get('/users/edit', 'UsersController@edit');
//ユーザ更新画面
Route::post('/users/update', 'UsersController@update');
// ==========ここまで追加する==========

// ==========ここから追加する==========
// ユーザ詳細画面（プロフィール編集画面へ）
Route::get('/users/{user_id}', 'UsersController@show');
// ==========ここまで追加する==========

//js test用
Route::get('test', function () {
    return view('test');
});

//user_icon用
Route::get('tweets_2', function () {
    return view('tweets_2');
});
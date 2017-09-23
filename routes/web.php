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
//Admin Auth
Route::group(['middleware' => 'checkifloggedIn'], function () {
Route::get('/', 'AuthController@login');
Route::post('/logme', 'AuthController@auth');
});
//Admin Dashboard
Route::group(['middleware' => 'checkifNotlogged'], function () {
Route::get('/dashboard', function(){return view('dashboard');});
Route::get('/logout', function(){ Session::flush(); return redirect ('/'); });
//Sub Admins
Route::group(['middleware' => 'checkifmaster'], function () {
Route::get('/Admin', 'AdminController@index');
Route::get('Admin/Add', 'AdminController@add');
Route::post('Admin/Insert', 'AdminController@__add');
Route::get('Admin/Delete/{ID}', 'AdminController@delete');
Route::get('Admin/Edit/{ID}', 'AdminController@edit');
Route::post('Admin/Update', 'AdminController@update');
Route::post('Admin/Status', 'AdminController@status');
});

//Questions
Route::get('/Questions', 'QuestionController@index');
Route::get('Questions/Add', 'QuestionController@add');
Route::post('Questions/Insert', 'QuestionController@__add');
Route::get('Questions/Delete/{ID}', 'QuestionController@delete');
Route::get('Questions/Edit/{ID}', 'QuestionController@edit');
Route::post('Questions/Update', 'QuestionController@update');
Route::post('Questions/Status', 'QuestionController@status');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



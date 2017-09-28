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
//Categories
Route::get('/Categories', 'CategoriesController@index');
Route::get('Categories/Add', 'CategoriesController@add');
Route::post('Categories/Insert', 'CategoriesController@__add');
Route::get('Categories/Delete/{ID}', 'CategoriesController@delete');
Route::get('Categories/Edit/{ID}', 'CategoriesController@edit');
Route::post('Categories/Update', 'CategoriesController@update');
Route::post('Categories/Status', 'CategoriesController@status');
//Sub Categories
Route::get('/SubCategories', 'SubCategoriesController@index');
Route::get('SubCategories/Add', 'SubCategoriesController@add');
Route::post('SubCategories/Insert', 'SubCategoriesController@__add');
Route::get('SubCategories/Delete/{ID}', 'SubCategoriesController@delete');
Route::get('SubCategories/Edit/{ID}', 'SubCategoriesController@edit');
Route::post('SubCategories/Update', 'SubCategoriesController@update');
Route::post('SubCategories/Status', 'SubCategoriesController@status');
//User Management
Route::get('/User', 'UserController@index');
Route::get('Users/Add', 'UserController@add');
Route::post('Users/Insert', 'UserController@__add');
Route::get('Users/Delete/{ID}', 'UserController@delete');
Route::get('Users/Edit/{ID}', 'UserController@edit');
Route::post('Users/Update', 'UserController@update');
Route::post('Users/Status', 'UserController@status');
//User Groups
Route::get('/UserGroups', 'UserGroupsController@index');
Route::get('User-Groups/Add', 'UserGroupsController@add');
Route::post('User-Groups/Insert', 'UserGroupsController@__add');
Route::get('User-Groups/Delete/{ID}', 'UserGroupsController@delete');
Route::get('User-Groups/Edit/{ID}', 'UserGroupsController@edit');
Route::post('User-Groups/Update', 'UserGroupsController@update');
Route::post('User-Groups/Status', 'UserGroupsController@status');
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



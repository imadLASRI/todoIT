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
Route::get('/Taskold', 'TaskController@index')->name('Task');
Route::get('/Category', 'CategoryController@index')->name('Category');
Route::get('deleteTask/{id}', 'TaskController@destroy')->name('deleteTask');
Route::get('editTask/{id}', 'TaskController@edit')->name('editTask');
Route::get('deleteCategory/{id}', 'CategoryController@destroy')->name('deleteCategory');

//onpage mode
Route::get('/onepage', 'HomeController@index')->name('onePage');

Route::post('/done', 'TaskController@done')->name('doneTask');
Route::post('/storeTask', 'TaskController@store')->name('storeTasks');
Route::post('Category', 'CategoryController@store')->name('storeCategories');
Route::post('updateTask', 'TaskController@update')->name('updateTask');
Route::post('updateCategory', 'CategoryController@update')->name('updateCategory');

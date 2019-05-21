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

Route::get('/', 'FrontendController@index')->name('welcome');

Auth::routes();

Route::prefix('backend')->group(function () {
    Route::get('/', 'BackendController@index')->name('home');
    Route::get('/items-management', 'BackendController@itemsManagement')->name('items-management');
    Route::get('/add-item', 'BackendController@AddItem')->name('add-item');
    Route::get('/update-item/{id}', 'BackendController@UpdateItem')->name('update-item');
    Route::post('add-update-item', 'BackendController@AddUpdateItem')->name('add-update-item');
    Route::get('delete-item/{id}', 'BackendController@DeleteItem')->name('delete-item');
    Route::get('/search','BackendController@search')->name('search');


});

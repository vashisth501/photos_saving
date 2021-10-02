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



Route::group(['middleware'=>'verifycsrf'],function (){
  Route::get('show','Crud\PhotoController@index');
  Route::post('store','Crud\PhotoController@store')->name('Upload');
});

Route::group(['middleware'=>'verifycsrf'],function (){
   Route::get('/', 'UploadController@index');
   Route::post('save','UploadController@store')->name('save');
});

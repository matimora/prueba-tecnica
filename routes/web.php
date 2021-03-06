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

Route::get('/', function () {
    return view('welcome');
});

// Routes function update
Route::get('update',function(){
   return view('update');
});
Route::post('up','HomeController@update');

//Routes function add
Route::get('adding/{id}',function($id){
    return view('add',compact('id'));
})->name('adding');
Route::post('add','HomeController@add');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

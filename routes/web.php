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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'accounts'], function(){
    Route::get('', 'AccountController@index')->name('account.index');
    Route::get('create', 'AccountController@create')->name('account.create');
    Route::post('store', 'AccountController@store')->name('account.store');
    Route::get('prideti/{account}', 'AccountController@prideti')->name('account.prideti');
    Route::post('prideti/{account}', 'AccountController@prideti')->name('account.prideti');
    Route::get('atimti/{account}', 'AccountController@atimti')->name('account.atimti');
    Route::post('atimti/{account}', 'AccountController@atimti')->name('account.atimti');
    Route::post('update/{account}', 'AccountController@update')->name('account.update');
    Route::post('delete/{account}', 'AccountController@destroy')->name('account.destroy');
    Route::get('show/{account}', 'AccountController@show')->name('account.show');
    Route::get('showAll/{account}', 'AccountController@showAll')->name('account.showAll');
 });
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

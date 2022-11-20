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


Route::get('/', 'ViewController@index')->name('home');
Route::get('/services', 'ViewController@services')->name('services');
Route::get('/about', 'ViewController@about')->name('about');
Route::get('/message', 'ViewController@message')->name('message');
Route::POST('/contactpost', 'ViewController@contact')->name('contactmessage');


Route::get('/viewcontact', 'adminController@viewcontact')->name('contactview');



Auth::routes();

Route::get('/home', 'HomeController@index');

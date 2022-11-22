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
Route::get('/category/{categoryid}', 'ViewController@servicesid')->name('servicesid');
Route::get('/about', 'ViewController@about')->name('about');
Route::get('/message', 'ViewController@message')->name('message');
Route::POST('/contactpost', 'ViewController@contact')->name('contactmessage');

Route::group(['middleware' => 'IsAdmin'], function () {
    //
    Route::get('/viewcontact', 'adminController@viewcontact')->name('contactview');
    Route::get('/deletecontact/{contactid}', 'adminController@deletecontact')->name('deletecontact');
    Route::get('/viewservies', 'adminController@viewservies')->name('viewservies');
    Route::POST('/categorypost', 'adminController@categorypost')->name('categorypost');
    Route::POST('/categoryupdate/{categoriesid}', 'adminController@categoryupdate')->name('categoryupdate');
    Route::get('/deleteservies/{categoriesid}', 'adminController@deleteservies')->name('deleteservies');

    Route::get('/viewworkers', 'adminController@viewworkers')->name('viewworkers');
    Route::POST('/workerpost', 'adminController@workerpost')->name('workerpost');
    Route::POST('/workerupdate/{workerid}', 'adminController@workerupdate')->name('workerupdate');
    Route::get('/deleteworker/{workerid}', 'adminController@deleteworker')->name('deleteworker');

    Route::get('/viewusers', 'adminController@viewusers')->name('viewusers');
    Route::get('/useradmin/{userid}', 'adminController@useradmin')->name('useradmin');


});



Auth::routes();

// Route::get('/home', 'HomeController@index');
Route::get('/home', 'ViewController@index');

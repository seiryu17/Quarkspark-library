<?php

use Illuminate\Support\Facades\Route;

//index
Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
//admin
Route::get('/manage', 'AdminController@index');
Route::get('/dashboard', 'AdminController@index');
Route::get('/booksview', 'AdminController@booksView');
Route::get('/show-image/{id}', 'AdminController@showImage');
Route::get('/request-rent', 'AdminController@requestRent');
Route::get('/client-user', 'AdminController@clientUser');
Route::post('/add-book', 'AdminController@addBook');
Route::put('/update-book', 'AdminController@updateBook');
Route::put('/accept-rent/{id}', 'AdminController@acceptRent');
Route::put('/decline-rent/{id}', 'AdminController@declineRent');
Route::put('/activate-user/{id}', 'AdminController@activateUser');
Route::put('/deactivate-user/{id}', 'AdminController@deactivateUser');
Route::delete('/delete-book/{id}', 'AdminController@deleteBook');
//client
Route::put('/request-books/{id}', 'ClientController@requestBook');
Route::put('/return-books/{id}', 'ClientController@returnBook');
//alert
Route::get('/pesan','NotifController@index');
Route::get('/pesan/sukses','NotifController@sukses');
Route::get('/pesan/peringatan','NotifController@peringatan');
Route::get('/pesan/gagal','NotifController@gagal');
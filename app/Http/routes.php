<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'BlogController@index');
Route::get('/about', 'BlogController@about');
Route::get('/contact', 'BlogController@contact');
Route::get('/view', 'BlogController@view');
Route::post('/insertcomment', 'BlogController@insertComment');

Route::auth();

Route::get('/admin', 'AdminController@index');
Route::get('/insertpostpage', 'AdminController@insertPostPage');
Route::get('/viewpost', 'AdminController@viewPost');


Route::post('/insertpost', 'AdminController@insertPost');
Route::post('/updatepost', 'AdminController@updatePost');
Route::post('/deletepost', 'AdminController@deletePost');

Route::get('/api/get_all_blog', 'ApiController@getBlog');
Route::post('/api/create', 'ApiController@create');
Route::post('/api/edit/{id}', 'ApiController@edit');
Route::post('/api/delete/{id}', 'ApiController@delete');
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::auth();

Route::get('/images/{filename}', function ($filename)
{
	$path = storage_path('sampul') . '/' . $filename;

	$file = File::get($path);
	$type = File::mimeType($path);

	$response = Response::make($file);
	$response->header("Content-Type", $type);

	return $response;
});


Route::get('/','BlogController@home');
Route::get('home','BlogController@home');
Route::get('about','BlogController@about');
Route::get('logout',function ()
{
	Auth::logout();
	return redirect(url('/'));
});

Route::get('artikel','ArtikelController@index');
Route::get('artikel/add','ArtikelController@add');
Route::post('artikel/save','ArtikelController@save');
Route::get('artikel/edit/{id}','ArtikelController@edit');
Route::post('artikel/update','ArtikelController@update');
Route::get('artikel/delete/{id}','ArtikelController@delete');
Route::post('komentar','ArtikelController@komentar');
Route::get('hapuskomentar/{id}','ArtikelController@hapuskomentar');


Route::get('blog','BlogController@index');
Route::get('/{id}','BlogController@detail');





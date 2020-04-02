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

Route::get('/', 'FirstController@index');
Route::get('/about', 'FirstController@about');
/*Route::get('/article/{id}', 'FirstController@article')->where('id', '[0-9]+');*/

Route::get('/utilisateur/{id}', 'FirstController@utilisateur')->where('id', '[0-9]+');

Route::get('/chanson/nouvelle', 'FirstController@nouvellechanson')->middleware('auth');
Route::post('/chanson/create', 'FirstController@creerchanson')->middleware('auth');

Route::get('/suivre/{id}', 'FirstController@suivre')->where('id', '[0-9]+')->middleware('auth');

Route::get('/playlists/{id}', 'FirstController@playlists')->where('id', '[0-9]+');
Route::post('/playlist/create', 'FirstController@creerplaylist')->middleware('auth');
Route::get('/ajouterplaylist/{chanson_id}/{playlists_id}', 'FirstController@ajouterplaylist')->where('playlists_id', '[0-9]+');
Route::get('/playlist/delete/{id}', 'FirstController@supprimerplaylist')->where('id', '[0-9]+')->middleware('auth');
Route::get('/playlist/deletechanson/{chanson_id}/{playlist_id}', 'FirstController@supprimerchansonplaylist')->middleware('auth');

Route::get('/search/{s}', 'FirstController@search');

Route::get('/like/{id}', 'FirstController@like')->where('id', '[0-9]+')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/like/{id}', 'FirstController@like')->where ('id','[0-9]+')->middleware('auth');

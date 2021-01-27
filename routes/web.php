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

Route::get('/', 'App\Http\Controllers\NotesController@index')->name('landingpage');
Route::delete('/{id}', 'App\Http\Controllers\NotesController@destroy')->name('remove');
Route::get('/edit/{id}', 'App\Http\Controllers\NotesController@edit')->name('edit_note');
Route::put('/{id}', 'App\Http\Controllers\NotesController@update')->name('note_update');
Route::get('/archive', 'App\Http\Controllers\NotesController@archive')->name('archive');
Route::get('/archive/post/{id}', 'App\Http\Controllers\NotesController@history')->name('history');

Route::get('/addNote', 'App\Http\Controllers\NotesController@create')->name('create_note');
Route::post('/addNote', 'App\Http\Controllers\NotesController@store')->name('store_note');



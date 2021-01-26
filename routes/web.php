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

Route::get('/addNote', 'App\Http\Controllers\NotesController@create')->name('create_note');
Route::post('/addNote', 'App\Http\Controllers\NotesController@store')->name('store_note');



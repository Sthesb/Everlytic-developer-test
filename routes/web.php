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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserListings;



Route::get('/', 'UserListings@index');
Route::post('/add-user', 'UserListings@store');
Route::delete('/delete-user/{id}', 'UserListings@destroy');
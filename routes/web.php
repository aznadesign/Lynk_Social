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

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/feed', 'HomeController@index')->name('feed');

Route::group(['prefix' => 'profile', 'middleware' => ['auth','verified']], function(){
    Route::get('/', 'ProfileController@show')->name('profile');
    Route::post('/update', 'ProfileController@update')->name('profile.update');
    Route::get('/destroy', 'ProfileController@destroy')->name('profile.destroy');
});

Auth::routes();
Auth::routes(['verify' => true]);
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


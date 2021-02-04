<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', "HomeController@index")
        ->name('home');
Route::get('/detail/{slug}', "DetailController@index")
        ->name('detail');


Route::prefix('admin')
        ->namespace('Admin')
        ->middleware(['auth','admin', 'verified'])
        ->group(function(){
        Route::get('/','DashboardController@index')
                ->name('dashboard');

        Route::resource('paket-pariwisata', 'PaketPariwisataController');
        Route::resource('paket-gallery', 'PaketGalleryController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('video', 'VideoController');
        Route::resource('user', 'UserController');
});

Auth::routes(['verify' => true]);


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

Route::get('/', function () {
    return 'welcome';
});
/*Route::get('/ad','Controller@Ad');
Route::get('/soyad','Controller@Soyad');
Route::get('/toplama/{sayi1}/{sayi2}','Controller@Toplama');
Route::get('/cıkarma/{sayi1}/{sayi2}','Controller@Çıkarma');
Route::get('/carpma/{sayi1}/{sayi2}','Controller@Çarpma');
Route::get('/bölme/{sayi1}/{sayi2}','Controller@Bölme');*/

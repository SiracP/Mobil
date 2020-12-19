<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/listele','Odev@listele');
Route::post('/ekle','Odev@ekleme');
Route::post('/düzenle','Odev@düzenleme');
Route::post('/sil','Odev@silme');
Route::get('/kategori','Odev@kategorileme');

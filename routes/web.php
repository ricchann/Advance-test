<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/show', [ContactController::class, 'show']);
Route::post('/complete', [ContactController::class, 'create']);
Route::get('/search', [ContactController::class, 'search']);
Route::post('/search', [ContactController::class, 'delete']);
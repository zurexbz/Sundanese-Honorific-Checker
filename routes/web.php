<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\ReportController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/translation', [TranslationController::class, 'checkHonorific']);

Route::get('/guide', [HomeController::class, 'guide']);
Route::get('/report', [ReportController::class, 'index']);
Route::post('/report', [ReportController::class, 'report']);
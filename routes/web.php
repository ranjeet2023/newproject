<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[LocationController::class,'index']);
Route::get('/states',[LocationController::class,'getStates']);
Route::get('/cities', [LocationController::class,'getCities']);
Route::post('/store-location', [LocationController::class,'storeLocation']);
Route::get('/location', [LocationController::class,'location']);

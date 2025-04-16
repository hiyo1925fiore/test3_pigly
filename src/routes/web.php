<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightController;

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

Route::get('/register/step1', [WeightController::class, 'register'])
    ->middleware(['guest'])
    ->name('register.step1');
Route::post('/register/step1', [WeightController::class, 'registerForm'])
    ->middleware(['guest'])
    ->name('register.step1.post');
Route::get('/register/step2', [WeightController::class, 'showWeightRegisterForm'])
    ->middleware(['guest'])
    ->name('register.step2');
Route::post('/register/step2', [WeightController::class, 'registerComplete'])
    ->middleware(['guest'])
    ->name('register.step2.post');


Route::middleware('auth')->group(function () {
    Route::get('/weight_logs', [WeightController::class, 'weightLogs']);
});
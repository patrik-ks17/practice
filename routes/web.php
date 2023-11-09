<?php

use App\Http\Controllers\TesztController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('teszt', [TesztController::class,'index']);

Route::get('names', [TesztController::class,'names']);
Route::post('/names/create', [TesztController::class,'nameStore']);
Route::delete('/names/delete/{name}', [TesztController::class, 'nameDestroy']);

Route::get('/surname', [TesztController::class, 'surnames']);
Route::post('/families/create', [TesztController::class, 'familyStore']);
Route::delete('/families/delete/{name}', [TesztController::class, 'familyDestroy']);
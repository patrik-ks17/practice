<?php

use App\Http\Controllers\TesztController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('teszt', [TesztController::class,'index'])->name('teszt');

Route::get('names', [TesztController::class,'names']);
Route::post('/names/create', [TesztController::class,'nameStore'])->middleware('auth');
Route::delete('/names/delete/{name}', [TesztController::class, 'nameDestroy'])->middleware('auth');

Route::get('/surname', [TesztController::class, 'surnames']);
Route::post('/families/create', [TesztController::class, 'familyStore'])->middleware('auth');
Route::delete('/families/delete/{name}', [TesztController::class, 'familyDestroy'])->middleware('auth');


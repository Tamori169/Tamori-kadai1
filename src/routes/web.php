<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/',[ContactController::class, 'index']);
Route::post('/confirm',[ContactController::class,'confirm']);
Route::post('/thanks',[ContactController::class,'store'])
->name('thanks.store');
Route::post('/',[ContactController::class,'back'])
->name('contact.back');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class,'index']);
    Route::get('/search', [AdminController::class,'search'])
    ->name('admin.search');
    Route::get('/reset', [AdminController::class,'reset'])
    ->name('admin.reset');
    Route::get('/export', [AdminController::class,'export'])
    ->name('admin.export');
    Route::delete('/delete', [ContactController::class, 'destroy']);
});

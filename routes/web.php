<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('can:isAdmin');

Route::get('/', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction.index');
Route::get('/transaction/show/{transaction}', [App\Http\Controllers\TransactionController::class, 'show'])->name('transaction.show');
Route::get('/transaction/create', [App\Http\Controllers\TransactionController::class, 'create'])->name('transaction.create');
Route::post('/transaction/save', [App\Http\Controllers\TransactionController::class, 'save'])->name('transaction.save');
Route::get('/transaction/edit/{transaction}', [App\Http\Controllers\TransactionController::class, 'edit'])->name('transaction.edit');
Route::put('/transaction/update/{transaction}', [App\Http\Controllers\TransactionController::class, 'update'])->name('transaction.update');

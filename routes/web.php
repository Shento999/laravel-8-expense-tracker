<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'user'], function() {
    // Expense Routes
    Route::get('/expense', [ExpenseController::class, 'index'])->name('expense.list');
    Route::get('/expense/add', [ExpenseController::class, 'add'])->name('expense.add');
    Route::post('/expense/save', [ExpenseController::class, 'store'])->name('expense.save');
    Route::get('/expense/view/{expense}', [ExpenseController::class, 'view'])->name('expense.view');
    Route::post('/expense/update', [ExpenseController::class, 'update'])->name('expense.update');
    Route::get('/expense/delete/{expense}', [ExpenseController::class, 'delete'])->name('expense.delete');
    // End
});

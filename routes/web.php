<?php

use Illuminate\Support\Facades\Route;
use App\Models\Expense;
use App\Models\Profit;
use App\Models\Income;
use App\Http\Controllers\ProfitController;
Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/expenses', function () {
    /**
     * @var Expense[] $expenses
     */
    $expenses = Expense::all();
    $total = 1000;
    // Pasar el array a la vista
    return view('expenses.index', ['expenses' => $expenses, 'total' => $total]);
})->name('expenses.index');
Route::get('/profit', [ProfitController::class, 'index'])->name('profit.index');
Route::get('/profit/new', [ProfitController::class, 'create']);
Route::post('/profit/new', [ProfitController::class, 'create']);
Route::get('/profit/{id}', [ProfitController::class, 'edit'])->name('profit.edit');
Route::post('/profit/{id}', [ProfitController::class, 'edit']);
Route::post('/profit/delete/{id}', [ProfitController::class, 'destroy'])->name('profit.destroy');
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Expense;
use App\Models\Profit;
use App\Models\Income;
use App\Http\Controllers\ProfitController;
Route::get('/', function () {
    return view('index');
});
Route::get('/expenses', function () {
    /**
     * @var Expense[] $expenses
     */
    $expenses = Expense::all();
    $total = 1000;
    // Pasar el array a la vista
    return view('expenses.index', ['expenses' => $expenses, 'total' => $total]);
});
Route::get('/profit', [ProfitController::class, 'index']);
Route::get('/profit/new', [ProfitController::class, 'create']);
Route::post('/profit/new', [ProfitController::class, 'create']);

<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfitController;
use Illuminate\Http\Request;
use App\Models\Expense;
Route::get('/', function () {
    return view('index');
})->name('index');
Route::group(['prefix' => 'expense'], function () {
    Route::get('', [ExpenseController::class, 'index'])->name('expense.index');
    Route::get('new', [ExpenseController::class, 'create'])->name('expense.new');
    Route::post('new', [ExpenseController::class, 'create']);
    Route::get('{id}', [ExpenseController::class, 'edit'])->name('expense.edit');
    Route::post('{id}', [ExpenseController::class, 'edit']);
    Route::post('delete/{id}', [ExpenseController::class, 'destroy'])->name('expense.destroy');

});
Route::group(['prefix' => 'profit'], function () {
    Route::get('', [ProfitController::class, 'index'])->name('profit.index');
    Route::get('new', [ProfitController::class, 'create']);
    Route::post('new', [ProfitController::class, 'create']);
    Route::get('{id}', [ProfitController::class, 'edit'])->name('profit.edit');
    Route::post('{id}', [ProfitController::class, 'edit']);
    Route::post('delete/{id}', [ProfitController::class, 'destroy'])->name('profit.destroy');
});
Route::get('/month', function (Request $request) {
    $requestedDate = $request->query('date');
    $expenses = Expense::select(['date', 'value'])->orderBy('date', 'ASC')
        ->when($requestedDate, function ($query) use ($requestedDate) {
            return $query->where('date', 'like', '%' . $requestedDate . '%');
        })->paginate(12);
    return view('month.index', ['expenses' => $expenses]);
})->name('month.index');
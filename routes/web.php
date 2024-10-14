<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfitController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/expense', [ExpenseController::class, 'index'])->name('expense.index');
Route::get('/expense/new', [ExpenseController::class, 'create'])->name('expense.new');
Route::post('/expense/new', [ExpenseController::class, 'create']);
Route::get('/expense/{id}', [ExpenseController::class, 'edit'])->name('expense.edit');
Route::post('/expense/{id}', [ExpenseController::class, 'edit']);
Route::post('/expense/delete/{id}', [ExpenseController::class, 'destroy'])->name('expense.destroy');
Route::get('/profit', [ProfitController::class, 'index'])->name('profit.index');
Route::get('/profit/new', [ProfitController::class, 'create']);
Route::post('/profit/new', [ProfitController::class, 'create']);
Route::get('/profit/{id}', [ProfitController::class, 'edit'])->name('profit.edit');
Route::post('/profit/{id}', [ProfitController::class, 'edit']);
Route::post('/profit/delete/{id}', [ProfitController::class, 'destroy'])->name('profit.destroy');
Route::get('/month', function (Request $request) {
    $requestedDate = $request->query('date');
    if ($requestedDate != null) {
        $months = DB::table('expense')
            ->where('date', 'like', '%' . $requestedDate . '%')
            ->select(DB::raw("date as formatted_date"))
            ->groupBy('formatted_date')
            ->orderByRaw('MIN(date) ASC')
            ->paginate(12);
        return view('month.index', compact('months'));
    } else {
        $months = DB::table('expense')
            ->select(DB::raw("date as formatted_date"))
            ->groupBy('formatted_date')
            ->orderByRaw('MIN(date) ASC')
            ->paginate(12);
        return view('month.index', compact('months'));
    }
})->name('month.index');
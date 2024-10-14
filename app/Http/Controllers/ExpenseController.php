<?php
namespace App\Http\Controllers;

use App\Models\Expense;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Illuminate\Support\Facades\Log;
class ExpenseController extends Controller
{
    //
    public function index(Request $request): View
    {
        $requestedDate = $request->query('date');
        if ($requestedDate != null) {
            Log::info('Date: ' . $requestedDate);
            $expenses = Expense::orderBy('id', 'ASC')->where('date', 'like', '%' . $requestedDate . '%')->paginate(12);
            return view('expense.index', ['expenses' => $expenses]);
        }
        $expenses = Expense::orderBy('id', 'ASC')->paginate(12);
        return view('expense.index', ['expenses' => $expenses]);
    }
    public function create(Request $request)
    {

        if ($request->isMethod('get')) {

            return view('expense.new');
        } elseif ($request->isMethod('post')) {
            $post = new Expense;
            $post->name = $request->name;
            $post->profit_id = $request->profit_id;
            $post->value = $request->value;
            $post->date = $request->date;
            $post->save();
            return redirect('expense')->with('status', 'New entry added');
        } else {
            throw new BadRequestHttpException;
        }

    }
    public function edit(int $id, Request $request)
    {
        $expense = Expense::with('profit')->find($id);
        if ($expense == null) {
            //return Exception Object not found
            return new Exception;
        } elseif ($request->isMethod('get')) {
            return view('expense.edit', ['expense' => $expense]);
        } elseif ($request->isMethod('post')) {
            $expense->income = $request->income;
            $expense->total = $request->total;
            $expense->date = $request->date;
            $expense->save();
            return redirect('expense');
        }
    }
    public function destroy($id)
    {
        $res = Expense::destroy($id);
        if ($res) {
            return redirect('expense');
        } else {
            throw new Exception();
        }
    }
}

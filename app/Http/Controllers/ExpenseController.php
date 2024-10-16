<?php
namespace App\Http\Controllers;

use App\Models\Expense;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
class ExpenseController extends Controller
{
    //
    public function index(Request $request): View
    {
        $requestedDate = $request->query('date');
        $requestedName = $request->query('name');
        $expenses = Expense::orderBy('id', 'ASC')
            ->when($requestedName, function ($query) use ($requestedName) {
                return $query->where('name', 'like', "%{$requestedName}%");
            })
            ->when($requestedDate, function ($query) use ($requestedDate) {
                return $query->orWhere('date', 'like', "%{$requestedDate}%");
            })
            ->paginate(12);
        return view('expense.index', ['expenses' => $expenses]);


    }
    public function create(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('expense.new');
        } elseif ($request->isMethod('post')) {
            $validatedData = $request->validate(['name' => 'required|max:255', 'value' => 'required|numeric', 'profit_id' => 'required|numeric', 'date' => 'required|date']);
            $post = new Expense($validatedData);
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
            $validatedData = $request->validate(['name' => 'required|max:255', 'value' => 'required|numeric', 'profit_id' => 'required|numeric', 'date' => 'required|date']);
            $expense->save($validatedData);
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

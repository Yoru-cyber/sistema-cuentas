<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class IncomeController extends Controller
{
    //
    public function index(Request $request): View
    {
        $requestedDate = $request->query('date');
        $requestedName = $request->query('name');
        $incomes = Income::orderBy('id', 'ASC')
            ->when($requestedName, function ($query) use ($requestedName) {
                return $query->where('name', 'like', "%{$requestedName}%");
            })
            ->when($requestedDate, function ($query) use ($requestedDate) {
                return $query->orWhere('date', 'like', "%{$requestedDate}%");
            })
            ->paginate(12);
        return view('income.index', ['incomes' => $incomes]);


    }

    public function create(Request $request) : View | RedirectResponse
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate(['name' => 'required|max:255', 'value' => 'required|numeric', 'profit_id' => 'required|numeric', 'date' => 'required|date']);
            $post = new Income($validatedData);
            $post->save();
            return redirect('income')->with('status', 'New entry added');
        } else return view('income.new');


    }

    public function edit(int $id, Request $request): View|ModelNotFoundException|RedirectResponse
    {
        $income = Income::with('profit')->find($id);
        if ($income == null) {
            //return Exception Object not found
            return new ModelNotFoundException();
        } elseif ($request->isMethod('post')) {
            $validatedData = $request->validate(['name' => 'required|max:255', 'value' => 'required|numeric', 'profit_id' => 'required|numeric', 'date' => 'required|date']);
            $income->save($validatedData);
            return redirect('income');
        } else return view('income.edit', ['income' => $income]);
    }

    public function destroy($id)
    {
        $res = Income::destroy($id);
        if ($res) {
            return redirect('income');
        } else return new BadRequestHttpException();
    }
}

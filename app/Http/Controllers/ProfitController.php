<?php

namespace App\Http\Controllers;

use App\Models\Profit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ProfitController extends Controller
{
    //
    public function index(): View
    {
        $profits = Profit::orderBy('id', 'DESC')->paginate(12);
        return view('profit.index', ['profits' => $profits]);
    }
    public function create(Request $request)
    {

        if ($request->isMethod('get')) {

            return view('profit.new');
        } elseif ($request->isMethod('post')) {
            $post = new Profit;
            $post->income = $request->income;
            $post->total = $request->total;
            $post->date = $request->date;
            $post->save();
            return redirect('profit')->with('status', 'New entry added');
        } else {
            throw new BadRequestHttpException;
        }

    }
    public function edit(int $id, Request $request)
    {
        $profit = Profit::find($id);
        if ($profit == null) {
            //return Exception Object not found
            return new Exception;
        } elseif ($request->isMethod('get')) {
            return view('profit.edit', ['profit' => $profit]);
        } elseif ($request->isMethod('post')) {
            $profit->income = $request->income;
            $profit->total = $request->total;
            $profit->date = $request->date;
            $profit->save();
            return redirect('profit');
        }
    }
    public function destroy($id)
    {
        $res = Profit::destroy($id);
        if ($res) {
            return redirect('/profit');
        } else {
            throw new Exception();
        }
    }
}

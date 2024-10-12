<?php

namespace App\Http\Controllers;

use App\Models\Profit;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ProfitController extends Controller
{
    //
    public function index(): View
    {
        $profits = Profit::all();
        return view('profit.index', ['profits' => $profits]);
    }
    public function create(Request $request)
    {

        if ($request->isMethod('get')) {

            return view('profit.new');
        }
        elseif ($request->isMethod('post')) {
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
}

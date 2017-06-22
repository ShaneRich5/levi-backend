<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use App\Events\ExpenseUpdated;
use App\Events\ExpenseCreated;
use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DistrictReport;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth')->only('update', 'store');
    }

    public function all() {
        return response()->json(['expenses' => Expense::all()]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'expenses' => Expense::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();

        $expense = new Expense;
        $expense->name = $request->input('name');
        $expense->amount = 0;

        if ($request->has('amount')) {
            $expense->amount = $request->input('amount');
        }

        $expense->district_report_id = $request->district_report_id;
        $expense->save();

        event(new ExpenseCreated($expense, $user));

        return response()->json([
            'status' => 'succes',
            'expense' => $expense
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $user = JWTAuth::parseToken()->toUser();
        $attribute = 'none';

        if ($request->has('name')) {
            $attribute = 'name';
            $expense->name = $request->input('name');
        }

        if ($request->has('amount')) {
            $attribute = 'amount';
            $expense->amount = $request->input('amount');
        }

        $expense->save();

        event(new ExpenseUpdated($expense, $user, $attribute));

        return response()->json([
            'expense' => $expense,
            'user' => $user,
            'attribute' => $attribute
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DistrictReport;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = DistrictReport::find($reportId);
        $expenses = $report->expenses()->get();

        return response()->json([
            'expenses' => $expenses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $reportId)
    {
        $report = DistrictReport::find($reportId);
        
        $expense = new Expense;
        
        $expense->name = $request->input('name');
        $expense->amount = 0;
        $expense->district_report_id = $report->id;
        $expense->save();

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
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
    public function update(Request $request, $id)
    {
        $expense = Expense::find($id);
        $expense->name = $request->input('name');
        $expense->amount = $request->input('amount');
        $expense->save();

        return response()->json([
            'status' => 'success',
            'expense' => $expense
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

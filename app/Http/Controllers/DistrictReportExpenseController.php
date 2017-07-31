<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\DistrictReport;
use Illuminate\Http\Request;
use App\Events\ExpenseUpdated;
use App\Events\ExpenseCreated;
use App\Http\Requests\StoreExpense;

class DistrictReportExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\DistrictReport  $districtReport
     * @return \Illuminate\Http\Response
     */
    public function index(DistrictReport $districtReport)
    {
        return [
            'expenses' => $districtReport->expenses()->get()
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DistrictReport  $districtReport
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DistrictReport $districtReport)
    {
        $expense = new Expense;
        $expense->name = $request->name;
        $expense->amount = 0;
        $districtReport->expenses()->save($expense);
        event(new ExpenseCreated($expense));

        return ['source' => $expense];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DistrictReport  $districtReport
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(DistrictReport $districtReport, Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DistrictReport  $districtReport
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DistrictReport $districtReport, Expense $expense)
    {
        $hasName = $request->has('name');
        $hasAmount = $request->has('amount');

        if ($hasName || $hasAmount) {
            if ($hasName) {
                $expense->name = $request->name;
            }
            if ($hasAmount) {
                $expense->amount = $request->amount;
            }

            $expense->save();

            event(new ExpenseUpdated($expense));
        }
        return ['expense' => $expense];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DistrictReport  $districtReport
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(DistrictReport $districtReport, Expense $expense)
    {
        //
    }
}

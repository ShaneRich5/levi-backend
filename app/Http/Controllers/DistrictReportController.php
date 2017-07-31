<?php

namespace App\Http\Controllers;

use App\Models\DistrictReport;
use Illuminate\Http\Request;

class DistrictReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DistrictReport  $districtReport
     * @return \Illuminate\Http\Response
     */
    public function show(DistrictReport $districtReport)
    {
        $expenses = $districtReport->expenses()->get();
        $churchReports = $districtReport->churchReports()->get();
        $sources = $districtReport->sources()->get();

        return [
            'district_report' => $districtReport,
            'church_reports' => $churchReports,
            'expenses' => $expenses,
            'sources' => $sources
        ];
    }

    public function indicators($id)
    {
        $districtReport = DistrictReport::find($id)->first();
        $expenses = $districtReport->expenses()->get();
        $sources = $districtReport->sources()->get();

        return [
            'expenses' => $expenses,
            'sources' => $sources
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DistrictReport  $districtReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DistrictReport $districtReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DistrictReport  $districtReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(DistrictReport $districtReport)
    {
        //
    }
}

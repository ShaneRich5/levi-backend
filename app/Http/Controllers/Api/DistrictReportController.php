<?php

namespace App\Http\Controllers\Api;

use App\Models\DistrictReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['districtReport' => DistrictReport::all()]);
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
     * @param  \App\DistrictReport  $districtReport
     * @return \Illuminate\Http\Response
     */
    public function show(DistrictReport $districtReport)
    {
        return response()->json([
            'districtReport' => $districtReport,
            'expenses' => $districtReport->expenses()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DistrictReport  $districtReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DistrictReport $districtReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DistrictReport  $districtReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(DistrictReport $districtReport)
    {
        //
    }
}

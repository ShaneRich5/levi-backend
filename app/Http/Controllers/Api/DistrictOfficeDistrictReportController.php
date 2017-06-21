<?php

namespace App\Http\Controllers\Api;

use App\Models\DistrictReport;
use App\Models\DistrictOffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictOfficeDistrictReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\DistrictOffice  $districtOffice
     * @return \Illuminate\Http\Response
     */
    public function index(DistrictOffice $districtOffice)
    {
        return response()->json([
            'districtReports' => $districtOffice->districtReports()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DistrictOffice  $districtOffice
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DistrictOffice $districtOffice)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DistrictOffice  $districtOffice
     * @param  \App\Models\DistrictReport  $districtReport
     * @return \Illuminate\Http\Response
     */
    public function show(DistrictOffice $districtOffice, DistrictReport $districtReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DistrictOffice  $districtOffice
     * @param  \App\Models\DistrictReport  $districtReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DistrictOffice $districtOffice, DistrictReport $districtReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DistrictOffice  $districtOffice
     * @param  \App\Models\DistrictReport  $districtReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(DistrictOffice $districtOffice, DistrictReport $districtReport)
    {
        //
    }
}

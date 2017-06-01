<?php

namespace App\Http\Controllers\Api;

use App\Models\DistrictOffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ChurchReport;

class DistrictOfficeController extends Controller
{
    public function reports($id)
    {
        $districtOffice = DistrictOffice::find($id);
        $districtReports = $districtOffice->districtReports()->get();

        $churchReports = array_map(function($districtReport) {
            return ChurchReport::where('district_report_id', $districtReport['id'])->get();
        }, $districtReports->toArray())[0]->toArray();

        $reports = array_map(function($report) {
            $arr = $report;
            $arr['total'] = ChurchReport::find($report['id'])->total();
            return $arr;
        }, $churchReports);

        return response()->json([
            'churchReports' => $reports,
            'districtReports' => $districtReports
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districtOffices = DistrictOffice::all();
        return response()->json([
            'districtOffices' => $districtOffices
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DistrictOffice  $districtOffice
     * @return \Illuminate\Http\Response
     */
    public function show(DistrictOffice $districtOffice)
    {
        return response()->json($districtOffice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DistrictOffice  $districtOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(DistrictOffice $districtOffice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DistrictOffice  $districtOffice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DistrictOffice $districtOffice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DistrictOffice  $districtOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(DistrictOffice $districtOffice)
    {
        //
    }
}

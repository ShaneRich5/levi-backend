<?php

namespace App\Http\Controllers;

use App\Models\ChurchReport;
use Illuminate\Http\Request;

class ChurchReportController extends Controller
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
     * @param  \App\Models\ChurchReport  $churchReport
     * @return \Illuminate\Http\Response
     */
    public function show(ChurchReport $churchReport)
    {
        $sources = $churchReport->sources()->get();
        return [
            'sources' => $sources,
            'church_report' => $churchReport
        ];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChurchReport  $churchReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChurchReport $churchReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChurchReport  $churchReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChurchReport $churchReport)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\ChurchReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChurchReportController extends Controller
{
    public function total($id)
    {
        $report = ChurchReport::find($id);
        return response()->json($report->total());
        // return response()->json($report->sources()->get());
    }

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
     * @param  \App\ChurchReport  $churchReport
     * @return \Illuminate\Http\Response
     */
    public function show(ChurchReport $churchReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChurchReport  $churchReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ChurchReport $churchReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChurchReport  $churchReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChurchReport $churchReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChurchReport  $churchReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChurchReport $churchReport)
    {
        //
    }
}

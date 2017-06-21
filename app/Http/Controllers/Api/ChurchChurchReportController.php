<?php

namespace App\Http\Controllers\Api;

use App\Models\ChurchReport;
use App\Models\Church;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ChurchChurchReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function index(Church $church)
    {
        return response()->json([
            'churchReports' => $church->churchReports()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Church $church)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Church  $church
     * @param  \App\Models\ChurchReport  $churchReport
     * @return \Illuminate\Http\Response
     */
    public function show(Church $church, ChurchReport $churchReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Church  $church
     * @param  \App\Models\ChurchReport  $churchReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Church $church, ChurchReport $churchReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Church  $church
     * @param  \App\Models\ChurchReport  $churchReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Church $church, ChurchReport $churchReport)
    {
        //
    }
}

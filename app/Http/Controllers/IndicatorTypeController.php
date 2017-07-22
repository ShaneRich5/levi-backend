<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIndicatorType;
use App\Models\IndicatorType;
use Illuminate\Http\Request;

class IndicatorTypeController extends Controller
{
    protected $indicatorType;

    public function __construct(IndicatorType $indicatorType)
    {
        $this->indicatorType = $indicatorType;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'indicator_types' => $this->indicatorType->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIndicatorType $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IndicatorType  $indicatorType
     * @return \Illuminate\Http\Response
     */
    public function show(IndicatorType $indicatorType)
    {
        return response()->json(['indicator_type' => $indicatorType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IndicatorType  $indicatorType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IndicatorType $indicatorType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IndicatorType  $indicatorType
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndicatorType $indicatorType)
    {
        //
    }
}

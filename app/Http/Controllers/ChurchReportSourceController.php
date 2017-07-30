<?php

namespace App\Http\Controllers;

use App\Models\Source;
use App\Models\ChurchReport;
use Illuminate\Http\Request;
use App\Events\SourceUpdated;
use App\Events\SourceCreated;
use App\Http\Requests\StoreSource;

class ChurchReportSourceController extends Controller
{
    protected $source;

    public function __construct(Source $source) {
        $this->source = $source;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\ChurchReport  $churchReport
     * @return \Illuminate\Http\Response
     */
    public function index(ChurchReport $churchReport)
    {
        return ['sources' => $churchReport->sources()->get()];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChurchReport  $churchReport
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSource $request, ChurchReport $churchReport)
    {
        $source = new Source;
        $source->name = $request->name;
        $source->amount = 0;
        $churchReport->sources()->save($source);
        event(new SourceCreated($source));

        return ['source' => $source];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChurchReport  $churchReport
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(ChurchReport $churchReport, Source $source)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChurchReport  $churchReport
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChurchReport $churchReport, Source $source)
    {
        $hasName = $request->has('name');
        $hasAmount = $request->has('amount');

        if ($hasName || $hasAmount) {
            if ($hasName) {
                $source->name = $request->name;
            }
            if ($hasAmount) {
                $source->amount = $request->amount;
            }

            $source->save();

            event(new SourceUpdated($source));
        }
        return ['source' => $source];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChurchReport  $churchReport
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChurchReport $churchReport, Source $source)
    {
        //
    }
}

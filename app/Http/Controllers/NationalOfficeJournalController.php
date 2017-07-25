<?php

namespace App\Http\Controllers;

use App\Models\NationalOffice;
use App\Models\Journal;
use App\Models\DistrictOffice;
use App\Models\DistrictReport;
use App\Models\Church;
use App\Models\ChurchReport;
use App\Models\Report;
use Illuminate\Http\Request;

class NationalOfficeJournalController extends Controller
{
    protected $journal;

    public function __construct(Journal $journal)
    {
        $this->journal = $journal;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\NationalOffice  $nationalOffice
     * @return \Illuminate\Http\Response
     */
    public function index(NationalOffice $nationalOffice)
    {
        return [
            'journals' => $nationalOffice->journals()->get()
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NationalOffice  $nationalOffice
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, NationalOffice $nationalOffice)
    {
        $journal = new Journal;
        $journal->national_office_id = $nationalOffice->id;
        $journal->save();
        $journalTitle = 'Journal #' . $journal->id;
        $journal->report()->save(new Report(['title' => $journalTitle]));

        $districtOffices = $nationalOffice->districtOffices()->get();

        foreach($districtOffices as $districtOffice) {
            $districtReport = new DistrictReport;
            $districtReport->journal_id = $journal->id;
            $districtReport->district_office_id = $districtOffice->id;
            $districtReport->save();
            $districtReportTitle = 'District Report #' . $districtReport->id;
            $districtReport->report()->save(new Report(['title' => $districtReportTitle]));

            $churches = $districtOffice->churches()->get();

            foreach($churches as $church) {
                $churchReport = new ChurchReport;
                $churchReport->district_report_id = $districtReport->id;
                $churchReport->church_id = $church->id;
                $churchReport->save();
                $churchReportTitle = 'Church Report #' . $churchReport->id;
                $churchReport->report()->save(new Report(['title' => $churchReportTitle]));
            }
        }

        return [
            'journal' => $journal
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NationalOffice  $nationalOffice
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show(NationalOffice $nationalOffice, Journal $journal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NationalOffice  $nationalOffice
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NationalOffice $nationalOffice, Journal $journal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NationalOffice  $nationalOffice
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy(NationalOffice $nationalOffice, Journal $journal)
    {
        //
    }
}

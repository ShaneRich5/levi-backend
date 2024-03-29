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
use App\Http\Requests\StoreJournal;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'journals' => Journal::all(),
            'church_reports' => ChurchReport::all(),
            'district_reports' => DistrictReport::all()
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJournal $request)
    {
        $journal = new Journal;
        $journal->national_office_id = $request->national_office;
        $journal->save();
        $journal->report()->save(new Report(['title' => 'Journal #' + $journal->id]));

        $districtOffices = NationalOffice::find($request->national_office)->districtOffices()->get();

        foreach($districtOffices as $districtOffice) {
            $districtReport = new DistrictReport;
            $districtReport->journal_id = $journal->id;
            $districtReport->district_office_id = $districtOffice->id;
            $districtReport->save();
            $districtReport->report()->save(new Report(['title' => 'District Report #' + $districtReport->id]));

            $churches = $districtOffice->churches()->get();

            foreach($churches as $church) {
                $churchReport = new ChurchReport;
                $churchReport->district_report_id = $districtReport->id;
                $churchReport->church_id = $church->id;
                $churchReport->save();
                $churchReport->report()->save(new Report(['title' => 'Church Report #' + $churchReport->id]));
            }
        }

        return [
            'journal' => $journal,
            'district_report' => $journal->districtReports()->get(),
            'church_report' => $journal->churchReports()->get()
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show(Journal $journal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Journal $journal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journal $journal)
    {
        //
    }
}

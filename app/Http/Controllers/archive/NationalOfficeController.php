<?php

namespace App\Http\Controllers\Api;

use App\Models\Source;
use App\Models\Journal;
use Illuminate\Http\Request;
use App\Models\NationalOffice;
use App\Http\Controllers\Controller;

class NationalOfficeController extends Controller
{
    public function journals()
    {
        $data = array();

        $tithes = Source::where('name', 'LIKE', "%tithe%")->sum('amount') / 100;

        $data[] = [
            'name' => 'Tithe of Tithe - General Fund 86%',
            'amount' => $tithes * 0.86
        ];

        $data[] = [
            'name' => 'Tithe of Tithe - ChurchCare 1%',
            'amount' => $tithes * 0.01
        ];

        $data[] = [
            'name' => 'Tithe of Tithe - Bethel  6%',
            'amount' => $tithes * 0.06
        ];

        $data[] = [
            'name' => 'Tithe of Tithes - Convention Centre 3%',
            'amount' => $tithes * 0.03
        ];

        $data[] = [
            'name' => 'Tithe of Tithes - Campsite 2%',
            'amount' => $tithes * 0.02
        ];

        $data[] = [
            'name' => 'Tithe of Tithes - Supplement  2%',
            'amount' => $tithes * 0.02
        ];

        $school = Source::where('name', 'LIKE', "%school%")->sum('amount') / 100;

        $data[] = ['name' => 'Sunday School - Yth Dept 80%', 'amount' => $school * 0.8];
        $data[] = ['name' => 'Sunday School - Bethel 20%', 'amount' => $school * 0.2];

        $pension = Source::where('name', 'LIKE', "%pension%")->sum('amount') / 100;

        $data[] = ['name' => 'Pension 5%', 'amount' => $pension * 0.05];
        $data[] = ['name' => 'Pension 2%', 'amount' => $pension * 0.02];

        $rally = Source::where('name', 'LIKE', "%rally%")->sum('amount') / 100;

        $data[] = ['name' => 'Rally - 22.5% Bethel', 'amount' => $rally * 0.225];
        $data[] = ['name' => 'Rally - 20% Evangelism', 'amount' => $rally * 0.2];
        $data[] = ['name' => 'Rally - 12.5% - Supplement', 'amount' => $rally * 0.125];
        $data[] = ['name' => "Rally - 25% Minster's Life Insurance", 'amount' => $rally * 0.25];
        $data[] = ['name' => 'Rally - 10% Convention Centre', 'amount' => $rally * 0.1];
        $data[] = ['name' => 'Rally - 10% Campsite', 'amount' => $rally * 0.1];

        $mission = Source::where('name', 'LIKE', "%mission%")->sum('amount') / 100;

        $data[] = ['name' => 'Missions - 86% Evangelism', 'amount' => $mission * 0.86];
        $data[] = ['name' => 'Missions - 10% Bethel', 'amount' => $mission * 0.1];
        $data[] = ['name' => 'Missions - 4% Convention Cente', 'amount' => $mission * 0.04];

        $journal = Journal::first()->get()->toArray()[0];
        $journal['accounts'] = $data;


        return response()->json([
            'journal' => $journal
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nationalOffices = NationalOffice::all();
        return response()->json([
            'nationalOffices' => $nationalOffices
        ]);
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
     * @param  \App\NationalOffice  $nationalOffice
     * @return \Illuminate\Http\Response
     */
    public function show(NationalOffice $nationalOffice)
    {
        return response()->json($nationalOffice);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NationalOffice  $nationalOffice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NationalOffice $nationalOffice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NationalOffice  $nationalOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(NationalOffice $nationalOffice)
    {
        //
    }
}

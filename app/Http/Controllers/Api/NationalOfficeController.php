<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\NationalOffice;
use App\Http\Controllers\Controller;

class NationalOfficeController extends Controller
{
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
     * @param  \App\NationalOffice  $nationalOffice
     * @return \Illuminate\Http\Response
     */
    public function show(NationalOffice $nationalOffice)
    {
        return response()->json($nationalOffice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NationalOffice  $nationalOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(NationalOffice $nationalOffice)
    {
        //
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

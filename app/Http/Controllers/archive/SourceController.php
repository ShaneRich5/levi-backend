<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use App\Models\Source;
use App\Events\SourceUpdated;
use App\Events\ChurchReportUpdated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth')->only('update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = Source::all();
        return response()->json(['sources' => $sources]);
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
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        return response()->json(['source' => $source]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Source $source)
    {
        $user = JWTAuth::parseToken()->toUser();
        $attribute = 'none';

        if ($request->has('name')) {
            $attribute = 'name';
            $source->name = $request->input('name');
        }

        if ($request->has('amount')) {
            $attribute = 'amount';
            $source->amount = $request->input('amount');
        }

        $source->save();

        event(new SourceUpdated($source, $user, $attribute));
        event(new ChurchReportUpdated($source->churchReport, $user));

        return response()->json([
            'source' => $source,
            'user' => $user,
            'attribute' => $attribute
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Requests\StoreOrganizationType;
use App\Models\OrganizationType;
use Illuminate\Http\Request;

class OrganizationTypeController extends Controller
{
    protected $organizationType;

    public function __construct(OrganizationType $organizationType)
    {
        $this->organizationType = $organizationType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = $this->organizationType->all(['id', 'name'])->toArray();
        return response()->json([
            'organization_types' => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganizationType $request)
    {
        $type = new OrganizationType;
        $type->name = $request->name;

        if ($request->has('description')) {
            $type->description = $request->description;
        }

        $type->save();
        return response()->json($type);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrganizationType  $organizationType
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizationType $organizationType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrganizationType  $organizationType
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationType $organizationType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrganizationType  $organizationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganizationType $organizationType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrganizationType  $organizationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationType $organizationType)
    {
        //
    }
}

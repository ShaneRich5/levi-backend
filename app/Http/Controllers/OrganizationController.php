<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrganization;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['organizations' => Organization::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganization $request)
    {
        $address = new Address;
        $address->street = $request->street;
        $address->parish = $request->parish;
        $address->country = $request->country;
        $address->save();

        $organization = new Organization;
        $organization->name = $request->name;
        $organization->save();

        $organization->addresses()->attach($address);

        return $organization;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        return response()->json(['organization' => $organization]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        //
    }
}

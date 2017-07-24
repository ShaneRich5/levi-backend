<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Church;
use App\Models\DistrictOffice;
use App\Models\NationalOffice;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrganization;

class OrganizationController extends Controller
{
    protected $organization;
    protected $districtOffice;
    protected $nationalOffice;
    protected $church;

    public function __construct(Organization $organization, NationalOffice $nationalOffice, DistrictOffice $districtOffice, Church $church)
    {
        $this->organization = $organization;
        $this->nationalOffice = $nationalOffice;
        $this->districtOffice = $districtOffice;
        $this->church = $church;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = $this->organization->get();
        $nationalOffices = $this->nationalOffice->get();
        $districtOffices = $this->districtOffice->get();
        $churches = $this->church->get();

        return response()->json([
            'organizations' => $organizations,
            'district_offices' => $districtOffices,
            'national_offices' => $nationalOffices,
            'churches' => $churches
        ]);
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

        $types = $request->types;

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
        dd($request->all());
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

<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\OrganizationType;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrganization;

class OrganizationController extends Controller
{
    protected $organization;
    protected $organizationTypes;

    public function __construct(Organization $organization, OrganizationType $organizationType)
    {
        $this->organization = $organization;
        $this->organizationType = $organizationType;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = $this->organization->get();
        // $organizations = $this->organization->with(['types' => function($query) {
            // $query->select('id');
            // return collect($query->select('id')->get())->map(function($value) {
            //     return $value['id'];
            // });
        // }])->get();

        $types = $this->organizationType->all(['id', 'name', 'description']);

        return response()->json([
            'organizations' => $organizations,
            'organizationTypes' => $types
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

        $typeIds = collect($request->types)->filter(function($value) {
            return $this->organizationType->where('id', '=', $value['id'])->exists();
        })->map(function($value) {
            return $value['id'];
        });

        $organization->types()->attach($typeIds);

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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = ['name'];

    protected $hidden = ['pivot'];

    protected $appends = ['address', 'types'];

    public function address()
    {
        return $this->morphOne('App\Models\Address', 'addressable');
    }

    public function church()
    {
        return $this->hasOne('App\Models\Church');
    }

    public function districtOffice()
    {
        return $this->hasOne('App\Models\DistrictOffice');
    }

    public function getTypesAttribute()
    {
        $result = array();

        if ($church = $this->church()->first(['id'])) {
            $result['church'] = $church->id;
        }

        if ($districtOffice = $this->districtOffice()->first(['id'])) {
            $result['district_office'] = $districtOffice->id;
        }

        if ($nationalOffice = $this->nationalOffice()->first(['id'])) {
            $result['national_office'] = $nationalOffice->id;
        }

        return $result;
    }

    public function nationalOffice()
    {
        return $this->hasOne('App\Models\NationalOffice');
    }

    public function getAddressAttribute()
    {
        return $this->address()->first(['id', 'street', 'parish', 'country']);
    }


    public function getChurchAttribute()
    {
        return $this->church()->first(['id', 'organization_id', 'district_office_id']);
    }


    public function getDistrictOfficeAttribute()
    {
        return $this->districtOffice()->select('id', 'national_office_id');
    }


    public function getNationalOfficeAttribute()
    {
        return $this->nationalOffice()->select('id');
    }
/*
    public function types()
    {
        return $this->belongsToMany('App\Models\OrganizationType');
    }

    public function getTypesAttribute()
    {
        return $this->types()->pluck('id');
    }
*/
}

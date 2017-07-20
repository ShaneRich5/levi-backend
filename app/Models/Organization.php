<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'name'
    ];

    public function addresses()
    {
        return $this->belongsToMany('App\Models\Address');
    }

    public function organizationTypes()
    {
        return $this->belongsToMany('App\Models\OrganizationType');
    }

    public function churchReports() {
        return $this->hasMany('\App\Models\ChurchReport');
    }

    public function districtReports() {
        return $this->hasMany('\App\Models\DistrictReport');
    }

    public function journals() {
        return $this->hasMany('\App\Models\Journal');
    }
}

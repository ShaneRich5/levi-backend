<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = ['name'];

    protected $hidden = ['pivot'];

    protected $appends = ['types', 'address'];

    public function address()
    {
        return $this->morphOne('App\Models\Address', 'addressable');
    }

    public function types()
    {
        return $this->belongsToMany('App\Models\OrganizationType');
    }

    public function getTypesAttribute()
    {
        return $this->types()->pluck('id');
    }

    public function churches()
    {
        return $this->hasMany('App\Models\Organizations', 'organization_id');
    }

    public function


    // public function churchReports() {
    //     return $this->hasMany('\App\Models\ChurchReport');
    // }

    // public function districtReports() {
    //     return $this->hasMany('\App\Models\DistrictReport');
    // }

    // public function journals() {
    //     return $this->hasMany('\App\Models\Journal');
    // }
}

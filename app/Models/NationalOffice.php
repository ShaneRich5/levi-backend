<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NationalOffice extends Model
{
    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

    public function districtOffices()
    {
        return $this->hasMany('App\Models\DistrictOffice');
    }

    public function journals()
    {
        return $this->hasMany('App\Models\Journal');
    }
}

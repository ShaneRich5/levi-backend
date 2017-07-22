<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NationalOffice extends Model
{
    public function districtOffices()
    {
        return $this->hasMany('App\Models\DistrictOffice');
    }
}
